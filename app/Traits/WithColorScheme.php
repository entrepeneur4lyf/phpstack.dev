<?php

namespace App\Traits;

use App\Support\ColorSchemeManager;

trait WithColorScheme
{
    public string $colorScheme = 'light';
    protected ?ColorSchemeManager $colorSchemeManager = null;

    /**
     * Initialize the color scheme.
     */
    public function initializeWithColorScheme(): void
    {
        $this->colorSchemeManager = new ColorSchemeManager();
        $this->colorScheme = $this->colorSchemeManager->get();
    }

    /**
     * Toggle the color scheme.
     */
    public function toggleColorScheme(): void
    {
        if (!$this->colorSchemeManager) {
            $this->initializeWithColorScheme();
        }

        $newScheme = $this->colorScheme === 'light' ? 'dark' : 'light';
        $this->colorScheme = $newScheme;
        $this->colorSchemeManager->set($newScheme);

        $this->dispatch('color-scheme-updated', [
            'scheme' => $newScheme
        ]);
    }

    /**
     * Set a specific color scheme.
     */
    public function setColorScheme(string $scheme): void
    {
        if (!$this->colorSchemeManager) {
            $this->initializeWithColorScheme();
        }

        if (!in_array($scheme, ['light', 'dark', 'auto'])) {
            return;
        }

        $this->colorScheme = $scheme;
        $this->colorSchemeManager->set($scheme);

        $this->dispatch('color-scheme-updated', [
            'scheme' => $scheme
        ]);
    }

    /**
     * Get color scheme configuration.
     */
    public function getColorSchemeConfig(): array
    {
        if (!$this->colorSchemeManager) {
            $this->initializeWithColorScheme();
        }

        return $this->colorSchemeManager->getConfig();
    }

    /**
     * Get current color scheme.
     */
    public function getCurrentColorScheme(): string
    {
        if (!$this->colorSchemeManager) {
            $this->initializeWithColorScheme();
        }

        return $this->colorScheme;
    }
}
