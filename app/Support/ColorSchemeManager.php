<?php

namespace App\Support;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class ColorSchemeManager
{
    protected string $storageKey;
    protected bool $keepTransitions;
    protected ?string $forcedScheme;
    protected string $defaultScheme;
    protected array $validSchemes = ['light', 'dark', 'auto'];

    public function __construct()
    {
        $this->storageKey = Config::get('mantinelivewire.color-scheme.storage-key', 'mantine-color-scheme');
        $this->keepTransitions = Config::get('mantinelivewire.color-scheme.keep-transitions', false);
        $this->forcedScheme = Config::get('mantinelivewire.color-scheme.force');
        $this->defaultScheme = Config::get('mantinelivewire.color-scheme.default', 'light');

        // Validate configuration
        if (!in_array($this->defaultScheme, $this->validSchemes)) {
            Log::warning("Invalid default color scheme '{$this->defaultScheme}'. Falling back to 'light'.");
            $this->defaultScheme = 'light';
        }

        if ($this->forcedScheme && !in_array($this->forcedScheme, ['light', 'dark'])) {
            Log::warning("Invalid forced color scheme '{$this->forcedScheme}'. Forced scheme disabled.");
            $this->forcedScheme = null;
        }
    }

    /**
     * Get color scheme value from storage with fallbacks
     */
    public function get(): string
    {
        try {
            // If color scheme is forced, return it
            if ($this->forcedScheme) {
                return $this->forcedScheme;
            }

            // For authenticated users, prefer their stored preference
            if (Auth::check()) {
                $userScheme = Auth::user()->color_scheme;
                if ($userScheme && in_array($userScheme, $this->validSchemes)) {
                    return $userScheme;
                }
            }

            // For guests, use cookie value or default
            $cookieScheme = Cookie::get($this->storageKey);
            if ($cookieScheme && in_array($cookieScheme, $this->validSchemes)) {
                return $cookieScheme;
            }

            return $this->defaultScheme;
        } catch (\Exception $e) {
            Log::error("Error getting color scheme: {$e->getMessage()}");
            return 'light'; // Safest fallback
        }
    }

    /**
     * Set color scheme value in storage with validation
     */
    public function set(string $value): void
    {
        try {
            // Don't set if color scheme is forced
            if ($this->forcedScheme) {
                return;
            }

            // Validate value
            if (!in_array($value, $this->validSchemes)) {
                Log::warning("Invalid color scheme value '{$value}'. Ignoring.");
                return;
            }

            // Store in cookie for server-side access
            Cookie::queue($this->storageKey, $value, 60 * 24 * 365); // 1 year

            // Update authenticated user preference
            if (Auth::check()) {
                Auth::user()->update(['color_scheme' => $value]);
            }
        } catch (\Exception $e) {
            Log::error("Error setting color scheme: {$e->getMessage()}");
        }
    }

    /**
     * Get script to initialize color scheme with error handling
     */
    public function getInitScript(): string
    {
        $script = <<<JS
        (function() {
            function setColorScheme(scheme, initial = false) {
                try {
                    const root = document.documentElement;
                    
                    if (!{$this->keepTransitions} && !initial) {
                        // Disable transitions
                        const css = document.createElement('style');
                        css.appendChild(document.createTextNode('* { transition: none !important; }'));
                        document.head.appendChild(css);

                        // Force reflow
                        window.getComputedStyle(root).opacity;

                        // Set color scheme
                        root.setAttribute('data-mantine-color-scheme', scheme);

                        // Re-enable transitions
                        setTimeout(() => document.head.removeChild(css), 1);
                    } else {
                        root.setAttribute('data-mantine-color-scheme', scheme);
                    }

                    // Store in localStorage for client-side persistence
                    localStorage.setItem('{$this->storageKey}', scheme);
                } catch (error) {
                    console.warn('Failed to set color scheme:', error);
                    // Fallback to basic implementation
                    document.documentElement.setAttribute('data-mantine-color-scheme', scheme);
                }
            }

            function getSystemColorScheme() {
                try {
                    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                } catch (error) {
                    console.warn('Failed to detect system color scheme:', error);
                    return 'light';
                }
            }

            try {
                // Get initial color scheme
                const forcedScheme = '{$this->forcedScheme}';
                const defaultScheme = '{$this->defaultScheme}';
                const storedScheme = localStorage.getItem('{$this->storageKey}');
                
                let initialScheme;
                
                if (forcedScheme) {
                    initialScheme = forcedScheme;
                } else if (storedScheme === 'auto') {
                    initialScheme = getSystemColorScheme();
                    // Listen for system changes
                    try {
                        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                            setColorScheme(e.matches ? 'dark' : 'light');
                        });
                    } catch (error) {
                        console.warn('Failed to set up system color scheme listener:', error);
                    }
                } else {
                    initialScheme = storedScheme || defaultScheme;
                }

                // Set initial scheme before page renders
                setColorScheme(initialScheme, true);
            } catch (error) {
                console.warn('Failed to initialize color scheme:', error);
                // Emergency fallback
                document.documentElement.setAttribute('data-mantine-color-scheme', 'light');
            }
        })();
        JS;

        return "<script>{$script}</script>";
    }

    /**
     * Get configuration for Mantine components with CSS variables
     */
    public function getConfig(): array
    {
        return [
            'colorScheme' => $this->get(),
            'forcedColorScheme' => $this->forcedScheme,
            'defaultColorScheme' => $this->defaultScheme,
            'keepTransitions' => $this->keepTransitions,
            'cssVariablesSelector' => ':root',
            'deduplicateCssVariables' => true,
        ];
    }
}
