<?php

namespace MantineLivewire\Traits;

trait WithFormValues
{
    /**
     * Form values
     */
    protected array $formValues = [];

    /**
     * Initial form values
     */
    protected array $initialValues = [];

    /**
     * Form initialized state
     */
    protected bool $initialized = false;

    /**
     * Values change callbacks
     */
    protected array $watchers = [];

    /**
     * Initialize form with values
     */
    protected function initForm(array $values, array $options = []): void
    {
        if (!$this->initialized) {
            $this->initialValues = $values;
            $this->formValues = $values;
            $this->initialized = true;

            if (isset($options['onValuesChange'])) {
                $this->onValuesChange = $options['onValuesChange'];
            }

            if (isset($options['transformValues'])) {
                $this->transformValues = $options['transformValues'];
            }
        }
    }

    /**
     * Set all form values
     */
    protected function setValues(array $values): void
    {
        $oldValues = $this->formValues;
        $this->formValues = $this->mergeValues($this->formValues, $values);

        if (isset($this->onValuesChange)) {
            ($this->onValuesChange)($this->formValues);
        }

        $this->notifyWatchers($oldValues);
    }

    /**
     * Set single field value
     */
    protected function setFieldValue(string $field, $value): void
    {
        $oldValues = $this->formValues;
        data_set($this->formValues, $field, $value);

        if (isset($this->onValuesChange)) {
            ($this->onValuesChange)($this->formValues);
        }

        $this->notifyWatchers($oldValues);
        $this->onFieldChange($field, $value);
    }

    /**
     * Initialize form with values
     * Can only be called once
     */
    public function initialize(array $values): void
    {
        if (!$this->initialized) {
            $this->initialValues = $values;
            $this->formValues = $values;
            $this->initialized = true;
        }
    }

    /**
     * Reset form to initial values
     */
    protected function reset(): void
    {
        $oldValues = $this->formValues;
        $this->formValues = $this->initialValues;

        if (isset($this->onValuesChange)) {
            ($this->onValuesChange)($this->formValues);
        }

        $this->notifyWatchers($oldValues);
    }

    /**
     * Set new initial values
     */
    protected function setInitialValues(array $values): void
    {
        $this->initialValues = $values;
    }

    /**
     * Transform values before submission
     */
    protected $transformValues = null;

    /**
     * Get transformed values
     */
    protected function getTransformedValues(?array $values = null): array
    {
        $values = $values ?? $this->formValues;

        if (isset($this->transformValues)) {
            return ($this->transformValues)($values);
        }

        return $values;
    }

    /**
     * Called when any form value changes
     */
    protected $onValuesChange = null;

    /**
     * Called when specific field changes
     */
    protected function onFieldChange(string $field, $value): void
    {
        // Override in component to handle field changes
    }

    /**
     * Watch field changes
     */
    protected function watch(string $field, callable $callback): void
    {
        $this->watchers[$field] = $callback;
    }

    /**
     * Notify watchers of value changes
     */
    protected function notifyWatchers(array $oldValues): void
    {
        foreach ($this->watchers as $field => $callback) {
            $oldValue = data_get($oldValues, $field);
            $newValue = data_get($this->formValues, $field);

            if ($oldValue !== $newValue) {
                $callback([
                    'previousValue' => $oldValue,
                    'value' => $newValue,
                    'touched' => data_get($this->touched ?? [], $field, false),
                    'dirty' => $newValue !== data_get($this->initialValues, $field),
                ]);
            }
        }
    }

    /**
     * Get form input props
     */
    protected function getInputProps(string $field, array $options = []): array
    {
        $type = $options['type'] ?? 'input';

        $props = [
            'value' => data_get($this->formValues, $field),
            'wire:model.live' => "formValues.{$field}",
        ];

        if ($type === 'checkbox') {
            $props['checked'] = (bool) $props['value'];
            unset($props['value']);
        }

        if (!$this->initialized && !isset($options['allowUninitialized'])) {
            $props['disabled'] = true;
        }

        return array_merge(
            $props,
            $this->enhanceGetInputProps([
                'field' => $field,
                'options' => $options,
                'inputProps' => $props,
                'form' => $this,
            ])
        );
    }

    /**
     * Get input DOM node
     */
    protected function getInputNode(string $field): ?string
    {
        return "document.querySelector('[wire\\\\:model\\\\.live=\"formValues.$field\"]')";
    }

    /**
     * Enhance input props with additional properties
     */
    protected function enhanceGetInputProps(array $payload): array
    {
        if (!$this->initialized && !isset($payload['options']['allowUninitialized'])) {
            return ['disabled' => true];
        }

        return [];
    }

    /**
     * Merge nested values
     */
    protected function mergeValues(array $original, array $new): array
    {
        foreach ($new as $key => $value) {
            if (is_array($value) && isset($original[$key]) && is_array($original[$key])) {
                $original[$key] = $this->mergeValues($original[$key], $value);
            } else {
                $original[$key] = $value;
            }
        }

        return $original;
    }

    /**
     * Flatten array with dot notation
     */
    protected function flattenValues(array $array, string $prefix = ''): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $newKey = $prefix ? "{$prefix}.{$key}" : $key;

            if (is_array($value)) {
                $result = array_merge($result, $this->flattenValues($value, $newKey));
            } else {
                $result[$newKey] = $value;
            }
        }

        return $result;
    }
}
