<?php

namespace MantineLivewire\Support;

use Livewire\Component;

class FormContext
{
    /**
     * Parent form component
     */
    protected Component $form;

    /**
     * Create a new form context
     */
    public function __construct(Component $form)
    {
        $this->form = $form;
    }

    /**
     * Get form values
     */
    public function getValues(): array
    {
        return $this->form->formValues;
    }

    /**
     * Get form errors
     */
    public function getErrors(): array
    {
        return $this->form->formErrors;
    }

    /**
     * Get touched state
     */
    public function getTouched(): array
    {
        return $this->form->touched;
    }

    /**
     * Get dirty state
     */
    public function isDirty(): bool
    {
        return $this->form->isDirty;
    }

    /**
     * Get input props
     */
    public function getInputProps(string $field, array $options = []): array
    {
        return $this->form->getInputProps($field, $options);
    }

    /**
     * Set field value
     */
    public function setFieldValue(string $field, $value): void
    {
        $this->form->setFieldValue($field, $value);
    }

    /**
     * Set multiple values
     */
    public function setValues(array $values): void
    {
        $this->form->setValues($values);
    }

    /**
     * Set field error
     */
    public function setFieldError(string $field, $error): void
    {
        $this->form->setFieldError($field, $error);
    }

    /**
     * Clear field error
     */
    public function clearFieldError(string $field): void
    {
        $this->form->clearFieldError($field);
    }

    /**
     * Check if field is valid
     */
    public function isValid(?string $field = null): bool
    {
        return $this->form->isValid($field);
    }

    /**
     * Check if field is touched
     */
    public function isTouched(?string $field = null): bool
    {
        return $this->form->isTouched($field);
    }

    /**
     * Check if field is dirty
     */
    public function isDirtyField(?string $field = null): bool
    {
        return $this->form->isDirty($field);
    }

    /**
     * Reset form
     */
    public function reset(): void
    {
        $this->form->resetForm();
    }

    /**
     * Reset touched state
     */
    public function resetTouched(): void
    {
        $this->form->resetTouched();
    }

    /**
     * Reset dirty state
     */
    public function resetDirty(?array $values = null): void
    {
        $this->form->resetDirty($values);
    }

    /**
     * Reset all status
     */
    public function resetStatus(): void
    {
        $this->form->resetStatus();
    }

    /**
     * Validate form
     */
    public function validate(): array
    {
        return $this->form->validate();
    }

    /**
     * Submit form
     */
    public function submit(): void
    {
        $this->form->submitForm();
    }
}
