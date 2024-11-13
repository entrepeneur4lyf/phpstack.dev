<?php

namespace MantineLivewire\Support;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MingleLoader
{
    /**
     * Get the JavaScript imports for used components
     *
     * @return string
     */
    public static function getComponentImports(): string
    {
        $components = ComponentRegistry::getUsedComponents();
        $imports = [];
        $registrations = [];
        $basePath = config('mantinelivewire.js-basepath', 'resources/js');

        foreach ($components as $component) {
            // Convert component name to path format (e.g., MantineList -> mantine-list)
            $componentPath = Str::kebab($component);
            
            // Import React component
            $imports[] = "import {$component} from './{$componentPath}/{$component}';";
            
            // Register with Mingle using the correct path format
            $registrations[] = "mingle('{$basePath}/Components/{$component}/index.js', {$component});";
        }

        return implode("\n", [
            "import mingle from '@mingle/mingleReact';",
            "",
            "// Import React components",
            ...array_unique($imports),
            "",
            "// Register components with Mingle",
            ...array_unique($registrations),
        ]);
    }

    /**
     * Get the stylesheet imports for used components
     *
     * @return string
     */
    public static function getStylesheetImports(): string
    {
        $stylesheets = ComponentRegistry::getRequiredStylesheets();
        $imports = [];

        foreach ($stylesheets as $stylesheet => $enabled) {
            if ($enabled) {
                $imports[] = "import '{$stylesheet}';";
            }
        }

        return implode("\n", $imports);
    }

    /**
     * Generate the dynamic entry point for Mingle
     *
     * @return string
     */
    public static function generateEntryPoint(): string
    {
        return <<<JS
// Import React (required by Mingle)
import React from 'react';
import ReactDOM from 'react-dom/client';
import { createRoot } from 'react-dom/client';

// Make React available globally (required by Mingle)
window.React = React;
window.ReactDOM = ReactDOM;
window.createRoot = createRoot;

// Import required stylesheets
{$this->getStylesheetImports()}

// Import and register components
{$this->getComponentImports()}
JS;
    }

    /**
     * Write the dynamic entry point to disk
     *
     * @param string $path
     * @return bool
     */
    public static function writeDynamicEntryPoint(string $path): bool
    {
        $content = static::generateEntryPoint();
        return File::put($path, $content) !== false;
    }
}
