<?php

namespace MantineLivewire\Traits;

trait WithMantineForm
{
    use WithFormValues {
        initForm as protected initFormValues;
        setValues as protected setValuesBase;
        setFieldValue as protected setFieldValueBase;
        getInputProps as protected getInputPropsBase;
        reset as protected resetBase;
    }

    use WithFormValidation {
        getValidationProps as protected getValidationPropsBase;
    }

    use WithFormStatus {
        updateFieldStatus as protected updateFieldStatusBase;
        updateValuesStatus as protected updateValuesStatusBase;
        getStatusProps as protected getStatusPropsBase;
    }

    use WithFormLists;
    use WithFormContext;

    /**
     * Initialize form with values and options
     */
    protected function initForm(array $values, array $options = []): void
    {
        // Initialize values first since other traits depend on it
        $this->initFormValues($values, $options);

        // Initialize other features
        $this->initValidation($options);
        $this->initStatus($options);
    }

    /**
     * Set form values with validation and status tracking
     */
    protected function setValues(array $values, bool $shouldValidate = true): void
    {
        $this->setValuesBase($values);

        if ($this->clearErrorsOnChange) {
            foreach ($values as $field => $value) {
                $this->clearFieldError($field);
            }
        }

        if ($shouldValidate && $this->validateOnChange === true) {
            $this->validate();
        } elseif ($shouldValidate && is_array($this->validateOnChange)) {
            foreach ($values as $field => $value) {
                if (in_array($field, $this->validateOnChange)) {
                    $this->validateField($field);
                }
            }
        }

        $this->updateValuesStatusBase($values);
    }

    /**
     * Set single field value with validation and status tracking
     */
    protected function setFieldValue(string $field, $value, bool $shouldValidate = true): void
    {
        $this->setFieldValueBase($field, $value);

        if ($this->clearErrorsOnChange) {
            $this->clearFieldError($field);
        }

        if ($shouldValidate && ($this->validateOnChange === true || 
            (is_array($this->validateOnChange) && in_array($field, $this->validateOnChange)))) {
            $this->validateField($field);
        }

        $this->updateFieldStatusBase($field, $value);
    }

    /**
     * Get input props with validation and status
     */
    protected function getInputProps(string $field, array $options = []): array
    {
        $props = $this->getInputPropsBase($field, $options);

        // Add validation props
        if ($options['withError'] ?? ($options['type'] ?? 'input') === 'input') {
            $props = array_merge($props, $this->getValidationPropsBase($field));
        }

        // Add status props
        $props = array_merge($props, $this->getStatusPropsBase($field));

        return $props;
    }

    /**
     * Reset form with all features
     */
    protected function resetForm(): void
    {
        $this->resetBase();
        $this->clearErrors();
        $this->resetStatus();
    }

    /**
     * Initialize form with values from API/database
     */
    public function initialize(array $values): void
    {
        parent::initialize($values);
        $this->validate();
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
}
