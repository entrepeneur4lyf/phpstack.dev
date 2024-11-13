<?php

namespace App\Support;

use Closure;

class ZodResolver
{
    /**
     * Create a validation function from a Zod schema
     */
    public static function make(array $schema): Closure
    {
        return function(array $values) use ($schema) {
            $errors = [];

            foreach ($schema as $field => $rules) {
                if (str_contains($field, '*')) {
                    // Handle array field validation
                    static::validateArrayField($field, $rules, $values, $errors);
                } else {
                    // Handle regular field validation
                    static::validateField($field, $rules, $values, $errors);
                }
            }

            return $errors;
        };
    }

    /**
     * Validate a single field
     */
    protected static function validateField(string $field, array $rules, array $values, array &$errors): void
    {
        $value = data_get($values, $field);

        foreach ($rules as $rule) {
            $type = $rule['type'];
            $message = $rule['message'] ?? null;

            switch ($type) {
                case 'string':
                    if (!is_string($value)) {
                        $errors[$field] = $message ?? 'Must be a string';
                        return;
                    }
                    break;

                case 'number':
                    if (!is_numeric($value)) {
                        $errors[$field] = $message ?? 'Must be a number';
                        return;
                    }
                    break;

                case 'email':
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $errors[$field] = $message ?? 'Invalid email';
                        return;
                    }
                    break;

                case 'min':
                    $min = $rule['value'];
                    if (is_string($value) && strlen($value) < $min) {
                        $errors[$field] = $message ?? "Must be at least {$min} characters";
                        return;
                    }
                    if (is_numeric($value) && $value < $min) {
                        $errors[$field] = $message ?? "Must be at least {$min}";
                        return;
                    }
                    break;

                case 'max':
                    $max = $rule['value'];
                    if (is_string($value) && strlen($value) > $max) {
                        $errors[$field] = $message ?? "Must be at most {$max} characters";
                        return;
                    }
                    if (is_numeric($value) && $value > $max) {
                        $errors[$field] = $message ?? "Must be at most {$max}";
                        return;
                    }
                    break;

                case 'regex':
                    $pattern = $rule['pattern'];
                    if (!preg_match($pattern, $value)) {
                        $errors[$field] = $message ?? 'Invalid format';
                        return;
                    }
                    break;

                case 'enum':
                    $allowed = $rule['values'];
                    if (!in_array($value, $allowed)) {
                        $errors[$field] = $message ?? 'Invalid value';
                        return;
                    }
                    break;

                case 'custom':
                    $validator = $rule['validator'];
                    $error = $validator($value, $values);
                    if ($error) {
                        $errors[$field] = $error;
                        return;
                    }
                    break;
            }
        }
    }

    /**
     * Validate an array field
     */
    protected static function validateArrayField(string $pattern, array $rules, array $values, array &$errors): void
    {
        // Convert pattern to regex
        $regex = str_replace('.*.', '\.(\d+)\.', $pattern);
        $regex = "/^{$regex}$/";

        // Find all matching fields
        foreach (static::flattenArray($values) as $field => $value) {
            if (preg_match($regex, $field)) {
                static::validateField($field, $rules, $values, $errors);
            }
        }
    }

    /**
     * Flatten array with dot notation
     */
    protected static function flattenArray(array $array, string $prefix = ''): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $newKey = $prefix ? "{$prefix}.{$key}" : $key;

            if (is_array($value)) {
                $result = array_merge($result, static::flattenArray($value, $newKey));
            } else {
                $result[$newKey] = $value;
            }
        }

        return $result;
    }
}
