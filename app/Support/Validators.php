<?php

namespace App\Support;

class Validators
{
    /**
     * Check if value is not empty
     * Empty string, empty array, false, null and undefined values are considered empty
     */
    public static function isNotEmpty(?string $message = null): callable
    {
        return function($value) use ($message) {
            if (is_string($value)) {
                $value = trim($value);
            }

            if (empty($value) && $value !== 0) {
                return $message ?? 'This field cannot be empty';
            }

            return null;
        };
    }

    /**
     * Check if value is a valid email
     */
    public static function isEmail(?string $message = null): callable
    {
        return function($value) use ($message) {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                return $message ?? 'Invalid email';
            }

            return null;
        };
    }

    /**
     * Check if value matches given pattern
     */
    public static function matches(string $pattern, ?string $message = null): callable
    {
        return function($value) use ($pattern, $message) {
            if (!is_string($value) || !preg_match($pattern, $value)) {
                return $message ?? 'Invalid format';
            }

            return null;
        };
    }

    /**
     * Check if value is within given range
     */
    public static function isInRange(array $range, ?string $message = null): callable
    {
        return function($value) use ($range, $message) {
            if (!is_numeric($value)) {
                return $message ?? 'Value must be a number';
            }

            $value = (float) $value;
            $min = $range['min'] ?? -INF;
            $max = $range['max'] ?? INF;

            if ($value < $min || $value > $max) {
                return $message ?? "Value must be between {$min} and {$max}";
            }

            return null;
        };
    }

    /**
     * Check if value length is within given range
     */
    public static function hasLength($length, ?string $message = null): callable
    {
        return function($value) use ($length, $message) {
            if (is_string($value)) {
                $value = trim($value);
            }

            if (!property_exists($value, 'length') && !is_array($value) && !is_string($value)) {
                return $message ?? 'Value must have a length property';
            }

            $valueLength = is_array($value) ? count($value) : strlen($value);

            if (is_array($length)) {
                $min = $length['min'] ?? 0;
                $max = $length['max'] ?? INF;

                if ($valueLength < $min || $valueLength > $max) {
                    return $message ?? "Length must be between {$min} and {$max}";
                }
            } else {
                if ($valueLength !== $length) {
                    return $message ?? "Length must be exactly {$length}";
                }
            }

            return null;
        };
    }

    /**
     * Check if value matches another field
     */
    public static function matchesField(string $field, ?string $message = null): callable
    {
        return function($value, $values) use ($field, $message) {
            if (!isset($values[$field])) {
                return $message ?? "Field {$field} not found";
            }

            if ($value !== $values[$field]) {
                return $message ?? "Must match {$field}";
            }

            return null;
        };
    }

    /**
     * Check if value is a valid URL
     */
    public static function isUrl(?string $message = null): callable
    {
        return function($value) use ($message) {
            if (!filter_var($value, FILTER_VALIDATE_URL)) {
                return $message ?? 'Invalid URL';
            }

            return null;
        };
    }

    /**
     * Check if value is a valid hex color
     */
    public static function isHexColor(?string $message = null): callable
    {
        return static::matches(
            '/^#([0-9a-f]{3}){1,2}$/i',
            $message ?? 'Invalid hex color'
        );
    }

    /**
     * Check if value is a valid phone number
     */
    public static function isPhone(?string $message = null): callable
    {
        return static::matches(
            '/^\+?[\d\s-]{10,}$/',
            $message ?? 'Invalid phone number'
        );
    }

    /**
     * Check if value is a valid date
     */
    public static function isDate(?string $message = null): callable
    {
        return function($value) use ($message) {
            if (!strtotime($value)) {
                return $message ?? 'Invalid date';
            }

            return null;
        };
    }

    /**
     * Check if value is a valid JSON string
     */
    public static function isJson(?string $message = null): callable
    {
        return function($value) use ($message) {
            if (!is_string($value)) {
                return $message ?? 'Value must be a string';
            }

            json_decode($value);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return $message ?? 'Invalid JSON';
            }

            return null;
        };
    }

    /**
     * Check if value is a valid IP address
     */
    public static function isIp(?string $message = null): callable
    {
        return function($value) use ($message) {
            if (!filter_var($value, FILTER_VALIDATE_IP)) {
                return $message ?? 'Invalid IP address';
            }

            return null;
        };
    }

    /**
     * Check if value is a valid MAC address
     */
    public static function isMac(?string $message = null): callable
    {
        return static::matches(
            '/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
            $message ?? 'Invalid MAC address'
        );
    }

    /**
     * Check if value is a valid credit card number
     */
    public static function isCreditCard(?string $message = null): callable
    {
        return function($value) use ($message) {
            // Remove spaces and dashes
            $value = preg_replace('/\D/', '', $value);

            if (!ctype_digit($value)) {
                return $message ?? 'Invalid credit card number';
            }

            // Luhn algorithm
            $sum = 0;
            $length = strlen($value);
            for ($i = 0; $i < $length; $i++) {
                $digit = (int) $value[$length - 1 - $i];
                if ($i % 2 === 1) {
                    $digit *= 2;
                    if ($digit > 9) {
                        $digit -= 9;
                    }
                }
                $sum += $digit;
            }

            if ($sum % 10 !== 0) {
                return $message ?? 'Invalid credit card number';
            }

            return null;
        };
    }
}
