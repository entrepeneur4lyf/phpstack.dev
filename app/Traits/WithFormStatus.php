<?php

namespace MantineLivewire\Traits;

trait WithFormStatus
{
    /**
     * Form touched fields
     */
    protected array $touched = [];

    /**
     * Form dirty state
     */
    protected bool $isDirty = false;

    /**
     * Initialize status options
     */
    protected function initStatus(array $options = []): void
    {
        if (isset($options['initialTouched'])) {
            $this->touched = $options['initialTouched'];
        }

        if (isset($options['initialDirty'])) {
            foreach ($options['initialDirty'] as $field => $isDirty) {
                if ($isDirty) {
                    data_set($this->formValues, $field, data_get($this->formValues, $field));
                }
            }
            $this->isDirty = true;
        }
    }

    /**
     * Check if field or form is touched
     */
    public function isTouched(?string $field = null): bool
    {
        if ($field === null) {
            return !empty($this->touched);
        }

        return data_get($this->touched, $field, false);
    }

    /**
     * Check if field or form is dirty
     */
    public function isDirty(?string $field = null): bool
    {
        if ($field === null) {
            return $this->isDirty;
        }

        $currentValue = data_get($this->formValues, $field);
        $initialValue = data_get($this->initialValues, $field);

        return $currentValue !== $initialValue;
    }

    /**
     * Reset touched state
     */
    public function resetTouched(): void
    {
        $this->touched = [];
    }

    /**
     * Reset dirty state
     */
    public function resetDirty(?array $values = null): void
    {
        if ($values !== null) {
            $this->initialValues = $values;
        }
        $this->isDirty = false;
    }

    /**
     * Reset all status
     */
    public function resetStatus(): void
    {
        $this->resetTouched();
        $this->resetDirty();
    }

    /**
     * Update status when field changes
     */
    protected function updateFieldStatus(string $field, $value): void
    {
        // Mark field as touched
        data_set($this->touched, $field, true);

        // Update dirty state
        $currentValue = data_get($this->formValues, $field);
        $initialValue = data_get($this->initialValues, $field);
        $this->isDirty = $currentValue !== $initialValue;
    }

    /**
     * Update status when values change
     */
    protected function updateValuesStatus(array $values): void
    {
        // Mark fields as touched
        foreach ($values as $field => $value) {
            data_set($this->touched, $field, true);
        }

        // Update dirty state
        $this->isDirty = $this->formValues !== $this->initialValues;
    }

    /**
     * Get input props with status
     */
    protected function getStatusProps(string $field): array
    {
        return [
            'data-touched' => $this->isTouched($field),
            'data-dirty' => $this->isDirty($field),
        ];
    }
}
