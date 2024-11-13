<?php

namespace MantineLivewire\Traits;

use MantineLivewire\Support\FormContext;

trait WithFormContext
{
    /**
     * Create form context
     */
    public function createContext(): FormContext
    {
        return new FormContext($this);
    }

    /**
     * Get form values
     */
    public function getContextValues(): array
    {
        return $this->formValues;
    }

    /**
     * Get form errors
     */
    public function getContextErrors(): array
    {
        return $this->formErrors;
    }

    /**
     * Get touched state
     */
    public function getContextTouched(): array
    {
        return $this->touched;
    }

    /**
     * Get dirty state
     */
    public function getContextDirty(): bool
    {
        return $this->isDirty;
    }

    /**
     * Get input props
     */
    public function getContextInputProps(string $field, array $options = []): array
    {
        return $this->getInputProps($field, $options);
    }

    /**
     * Set field value
     */
    public function setContextFieldValue(string $field, $value): void
    {
        $this->setFieldValue($field, $value);
    }

    /**
     * Set multiple values
     */
    public function setContextValues(array $values): void
    {
        $this->setValues($values);
    }

    /**
     * Set field error
     */
    public function setContextFieldError(string $field, $error): void
    {
        $this->setFieldError($field, $error);
    }

    /**
     * Clear field error
     */
    public function clearContextFieldError(string $field): void
    {
        $this->clearFieldError($field);
    }

    /**
     * Check if field is valid
     */
    public function isContextValid(?string $field = null): bool
    {
        return $this->isValid($field);
    }

    /**
     * Check if field is touched
     */
    public function isContextTouched(?string $field = null): bool
    {
        return $this->isTouched($field);
    }

    /**
     * Check if field is dirty
     */
    public function isContextDirty(?string $field = null): bool
    {
        return $this->isDirty($field);
    }

    /**
     * Reset form
     */
    public function resetContext(): void
    {
        $this->resetForm();
    }

    /**
     * Reset touched state
     */
    public function resetContextTouched(): void
    {
        $this->resetTouched();
    }

    /**
     * Reset dirty state
     */
    public function resetContextDirty(?array $values = null): void
    {
        $this->resetDirty($values);
    }

    /**
     * Reset all status
     */
    public function resetContextStatus(): void
    {
        $this->resetStatus();
    }

    /**
     * Validate form
     */
    public function validateContext(): array
    {
        return $this->validate();
    }

    /**
     * Submit form
     */
    public function submitContext(): void
    {
        $this->submitForm();
    }

    /**
     * Remove list item
     */
    public function removeContextListItem(string $field, int $index): void
    {
        $this->removeListItem($field, $index);
    }

    /**
     * Insert list item
     */
    public function insertContextListItem(string $field, $item, ?int $index = null): void
    {
        $this->insertListItem($field, $item, $index);
    }

    /**
     * Reorder list item
     */
    public function reorderContextListItem(string $field, int $from, int $to): void
    {
        $this->reorderListItem($field, $from, $to);
    }
}
