<?php

namespace MantineLivewire\Traits;

trait WithFormLists
{
    /**
     * Remove item from list at given index
     */
    protected function removeListItem(string $field, int $index): void
    {
        $items = data_get($this->formValues, $field);
        if (!is_array($items)) {
            return;
        }

        unset($items[$index]);
        $items = array_values($items); // Re-index array

        data_set($this->formValues, $field, $items);

        // Clear any errors for removed item
        $pattern = str_replace('.', '\.', $field) . "\." . $index . "\.";
        foreach ($this->formErrors as $key => $error) {
            if (preg_match("/{$pattern}/", $key)) {
                unset($this->formErrors[$key]);
            }
        }

        // Update form status
        $this->updateValuesStatus([$field => $items]);
    }

    /**
     * Insert item into list at given index
     * If no index is provided, item will be appended to end
     */
    protected function insertListItem(string $field, $item, ?int $index = null): void
    {
        $items = data_get($this->formValues, $field, []);
        if (!is_array($items)) {
            $items = [];
        }

        if ($index === null) {
            $items[] = $item;
        } else {
            array_splice($items, $index, 0, [$item]);
        }

        data_set($this->formValues, $field, $items);

        // Update form status
        $this->updateValuesStatus([$field => $items]);
    }

    /**
     * Move list item from one position to another
     */
    protected function reorderListItem(string $field, int $from, int $to): void
    {
        $items = data_get($this->formValues, $field);
        if (!is_array($items)) {
            return;
        }

        if ($from === $to || $from >= count($items) || $to >= count($items)) {
            return;
        }

        $item = $items[$from];
        unset($items[$from]);
        array_splice($items, $to, 0, [$item]);
        $items = array_values($items); // Re-index array

        data_set($this->formValues, $field, $items);

        // Update error keys
        $pattern = str_replace('.', '\.', $field) . "\.(\d+)\.";
        $errors = [];
        foreach ($this->formErrors as $key => $error) {
            if (preg_match("/{$pattern}(.*)/", $key, $matches)) {
                $index = (int) $matches[1];
                $rest = $matches[2];

                if ($index === $from) {
                    $newKey = "{$field}.{$to}.{$rest}";
                } elseif ($index > $from && $index <= $to) {
                    $newKey = "{$field}." . ($index - 1) . ".{$rest}";
                } elseif ($index < $from && $index >= $to) {
                    $newKey = "{$field}." . ($index + 1) . ".{$rest}";
                } else {
                    $newKey = $key;
                }

                $errors[$newKey] = $error;
            } else {
                $errors[$key] = $error;
            }
        }
        $this->formErrors = $errors;

        // Update form status
        $this->updateValuesStatus([$field => $items]);
    }

    /**
     * Get list item props
     */
    protected function getListItemProps(string $field, int $index): array
    {
        return [
            'data-index' => $index,
            'data-field' => $field,
            'wire:sortable.item' => $index,
            'wire:key' => "{$field}.{$index}",
        ];
    }

    /**
     * Get list handle props
     */
    protected function getListHandleProps(): array
    {
        return [
            'wire:sortable.handle' => true,
        ];
    }

    /**
     * Get list wrapper props
     */
    protected function getListWrapperProps(string $field): array
    {
        return [
            'wire:sortable' => "reorderList('{$field}')",
            'wire:sortable.options' => json_encode(['animation' => 150]),
        ];
    }

    /**
     * Handle list reordering from sortable event
     */
    public function reorderList(string $field, array $order): void
    {
        $items = data_get($this->formValues, $field);
        if (!is_array($items)) {
            return;
        }

        $reordered = [];
        foreach ($order as $index) {
            $reordered[] = $items[$index];
        }

        data_set($this->formValues, $field, $reordered);

        // Update form status
        $this->updateValuesStatus([$field => $reordered]);
    }
}
