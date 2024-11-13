<?php

namespace App\Traits;

trait WithFormValidation
{
    /**
     * Form validation errors
     */
    protected array $formErrors = [];

    /**
     * Validation function
     */
    protected $validate = null;

    /**
     * Fields to validate on change
     */
    protected array|bool $validateOnChange = false;

    /**
     * Fields to validate on blur
     */
    protected array|bool $validateOnBlur = false;

    /**
     * Clear errors on change
     */
    protected bool $clearErrorsOnChange = true;

    /**
     * Initialize validation options
     */
    protected function initValidation(array $options = []): void
    {
        $this->validateOnChange = $options['validateOnChange'] ?? false;
        $this->validateOnBlur = $options['validateOnBlur'] ?? false;
        $this->clearErrorsOnChange = $options['clearErrorsOnChange'] ?? true;

        if (isset($options['validate'])) {
            $this->validate = $options['validate'];
        }
    }

    /**
     * Validate form
     */
    protected function validate(): array
    {
        $this->formErrors = [];

        // Use schema validation if provided
        if ($this->validate) {
            $this->formErrors = ($this->validate)($this->formValues);
            return $this->formErrors;
        }

        // Otherwise use validation rules
        foreach ($this->getValidationRules() as $field => $rules) {
            if (str_contains($field, '*')) {
                $this->validateArrayField($field, $rules);
            } else {
                $this->validateField($field);
            }
        }

        return $this->formErrors;
    }

    /**
     * Validate array field with wildcard
     */
    protected function validateArrayField(string $pattern, array $rules): void
    {
        $regex = str_replace('.*.', '\.(\d+)\.', $pattern);
        $regex = "/^{$regex}$/";

        foreach ($this->flattenValues($this->formValues) as $field => $value) {
            if (preg_match($regex, $field)) {
                foreach ($rules as $rule) {
                    $error = $rule($value, $this->formValues, $field);
                    if ($error) {
                        $this->formErrors[$field] = $error;
                        break;
                    }
                }
            }
        }
    }

    /**
     * Validate single field
     */
    protected function validateField(string $field): void
    {
        $value = data_get($this->formValues, $field);
        $rules = $this->getValidationRules()[$field] ?? [];

        foreach ($rules as $rule) {
            $error = $rule($value, $this->formValues, $field);
            if ($error) {
                $this->formErrors[$field] = $error;
                break;
            }
        }
    }

    /**
     * Check if form or field is valid without setting errors
     */
    protected function isValid(?string $field = null): bool
    {
        if ($field !== null) {
            $value = data_get($this->formValues, $field);
            $rules = $this->getValidationRules()[$field] ?? [];

            foreach ($rules as $rule) {
                if ($rule($value, $this->formValues, $field)) {
                    return false;
                }
            }

            return true;
        }

        // Use schema validation if provided
        if ($this->validate) {
            return empty(($this->validate)($this->formValues));
        }

        foreach ($this->getValidationRules() as $field => $rules) {
            if (str_contains($field, '*')) {
                $regex = str_replace('.*.', '\.(\d+)\.', $field);
                $regex = "/^{$regex}$/";

                foreach ($this->flattenValues($this->formValues) as $path => $value) {
                    if (preg_match($regex, $path)) {
                        foreach ($rules as $rule) {
                            if ($rule($value, $this->formValues, $path)) {
                                return false;
                            }
                        }
                    }
                }
            } else {
                $value = data_get($this->formValues, $field);
                foreach ($rules as $rule) {
                    if ($rule($value, $this->formValues, $field)) {
                        return false;
                    }
                }
            }
        }

        return true;
    }

    /**
     * Get validation rules
     */
    protected function getValidationRules(): array
    {
        return [];
    }

    /**
     * Set multiple form errors
     */
    protected function setErrors(array $errors): void
    {
        $this->formErrors = array_filter($errors, fn($error) => $error !== null);
    }

    /**
     * Set single field error
     */
    protected function setFieldError(string $field, $error): void
    {
        if ($error !== null) {
            $this->formErrors[$field] = $error;
        } else {
            $this->clearFieldError($field);
        }
    }

    /**
     * Clear all form errors
     */
    protected function clearErrors(): void
    {
        $this->formErrors = [];
    }

    /**
     * Clear single field error
     */
    protected function clearFieldError(string $field): void
    {
        unset($this->formErrors[$field]);
    }

    /**
     * Handle field blur
     */
    public function handleBlur(string $field): void
    {
        if ($this->validateOnBlur === true || 
            (is_array($this->validateOnBlur) && in_array($field, $this->validateOnBlur))) {
            $this->validateField($field);
        }
    }

    /**
     * Focus first invalid field
     */
    protected function focusFirstInvalid(): void
    {
        if (!empty($this->formErrors)) {
            $field = array_key_first($this->formErrors);
            $this->dispatch('focus-field', ['field' => $field]);
        }
    }

    /**
     * Handle form submission
     */
    public function submitForm(): void
    {
        if (empty($this->validate())) {
            $this->handleSubmit($this->getTransformedValues());
        } else {
            $this->focusFirstInvalid();
            $this->handleSubmitError($this->formErrors);
        }
    }

    /**
     * Handle successful form submission
     */
    protected function handleSubmit(array $values): void
    {
        // Override in component to handle submission
    }

    /**
     * Handle form submission error
     */
    protected function handleSubmitError(array $errors): void
    {
        // Override in component to handle submission errors
    }

    /**
     * Get input props with validation
     */
    protected function getValidationProps(string $field): array
    {
        $props = [];

        // Add error state
        $props['error'] = $this->formErrors[$field] ?? null;

        // Add blur handler
        if ($this->validateOnBlur === true || 
            (is_array($this->validateOnBlur) && in_array($field, $this->validateOnBlur))) {
            $props['wire:blur'] = "handleBlur('$field')";
        }

        return $props;
    }
}
