<?php

namespace App\Livewire\Forms;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Traits\WithMantineForm;

class LoginForm extends Form
{
    use WithMantineForm;

    #[Validate('required|string|email', message: 'Please enter a valid email address')]
    public string $email = '';

    #[Validate('required|string', message: 'Password is required')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Password is required',
        ];
    }

    /**
     * Get the Mantine form schema.
     *
     * @return array<string, mixed>
     */
    public function schema(): array
    {
        return [
            'email' => [
                'type' => 'text',
                'label' => 'Email',
                'placeholder' => 'your@email.com',
                'required' => true,
                'autoComplete' => 'username',
            ],
            'password' => [
                'type' => 'password',
                'label' => 'Password',
                'placeholder' => 'Your password',
                'required' => true,
                'autoComplete' => 'current-password',
            ],
            'remember' => [
                'type' => 'checkbox',
                'label' => 'Remember me',
            ],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        try {
            $this->ensureIsNotRateLimited();

            if (! Auth::attempt($this->only(['email', 'password']), $this->remember)) {
                RateLimiter::hit($this->throttleKey());

                throw ValidationException::withMessages([
                    'form.email' => trans('auth.failed'),
                ]);
            }

            RateLimiter::clear($this->throttleKey());

            // Show success notification
            $this->dispatch('mantine-notification', [
                'title' => 'Success',
                'message' => 'Successfully logged in',
                'color' => 'green',
            ]);

        } catch (ValidationException $e) {
            // Show error notification
            $this->dispatch('mantine-notification', [
                'title' => 'Error',
                'message' => $e->getMessage(),
                'color' => 'red',
            ]);

            throw $e;
        }
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        // Show error notification
        $this->dispatch('mantine-notification', [
            'title' => 'Error',
            'message' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
            'color' => 'red',
        ]);

        throw ValidationException::withMessages([
            'form.email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}
