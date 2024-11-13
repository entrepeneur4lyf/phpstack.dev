<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm as LoginFormModel;
use Ijpatricio\Mingle\Concerns\InteractsWithMingles;
use Ijpatricio\Mingle\Contracts\HasMingles;
use Livewire\Component;

class LoginForm extends Component implements HasMingles
{
    use InteractsWithMingles;

    public LoginFormModel $form;

    /**
     * Get the path to the React component.
     */
    public function component(): string
    {
        return 'resources/js/LoginForm/index.js';
    }

    /**
     * Get the data to pass to the React component.
     */
    public function mingleData(): array
    {
        return [
            'forgotPasswordLink' => route('password.request'),
            'schema' => $this->form->schema(),
        ];
    }

    /**
     * Attempt to authenticate the user.
     */
    public function authenticate(array $data): void
    {
        $this->form->email = $data['email'];
        $this->form->password = $data['password'];
        $this->form->remember = $data['remember'] ?? false;

        $this->form->authenticate();
    }

    /**
     * Render the component.
     */
    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
