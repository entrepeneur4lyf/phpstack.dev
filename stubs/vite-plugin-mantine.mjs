// vite-plugin-mantine.mjs
import fs from 'fs';
import path from 'path';
import glob from 'glob';

/**
 * Vite plugin for MantineLivewire that:
 * 1. Uses ComponentRegistry data for optimization
 * 2. Only includes used Mantine components
 * 3. Generates optimized bundle
 */
export function mantinePlugin() {
    return {
        name: 'vite-plugin-mantine',

        config(config) {
            // Read the component manifest generated by PHP
            const manifestPath = 'public/mantine-manifest.json';
            if (!fs.existsSync(manifestPath)) {
                console.warn('Mantine component manifest not found. Run php artisan mantinelivewire:build first.');
                return config;
            }

            const manifest = JSON.parse(fs.readFileSync(manifestPath, 'utf-8'));
            const { components } = manifest;

            // Find Laravel plugin in the config
            const laravelPlugin = config.plugins.find(
                plugin => plugin.name === 'laravel'
            );

            if (!laravelPlugin) {
                console.warn('Laravel Vite plugin not found');
                return config;
            }

            // Get current input array
            const currentInput = Array.isArray(laravelPlugin.config.input)
                ? laravelPlugin.config.input
                : [laravelPlugin.config.input];

            // Add component index.js files to input
            const componentInputs = components.map(
                component => `resources/MantineLiveWire/custom/react/components/${component}/index.js`
            );

            // Update Laravel plugin input
            laravelPlugin.config.input = [...currentInput, ...componentInputs];

            return config;
        },

        // Transform the entry point to only include used components
        async transform(code, id) {
            if (id.includes('dynamic-entry.js')) {
                // Read the component manifest generated by PHP
                const manifestPath = 'public/mantine-manifest.json';
                if (!fs.existsSync(manifestPath)) {
                    console.warn('Mantine component manifest not found. Run php artisan mantinelivewire:build first.');
                    return code;
                }

                const manifest = JSON.parse(fs.readFileSync(manifestPath, 'utf-8'));
                const { components } = manifest;

                const imports = [];
                const registrations = [];

                // Core dependencies only
                imports.push(`import React from 'react';`);
                imports.push(`import ReactDOM from 'react-dom/client';`);
                imports.push(`import { createRoot } from 'react-dom/client';`);
                imports.push(`import mingle from '@mingle/mingleReact';`);

                // Import components based on manifest
                components.forEach(component => {
                    imports.push(
                        `import ${component} from './components/${component}/${component}';`
                    );
                    registrations.push(
                        `mingle('resources/MantineLiveWire/custom/react/components/${component}/index.js', ${component});`
                    );
                });

                return {
                    code: `
                        ${imports.join('\n')}

                        // Make React available globally (required by Mingle)
                        window.React = React;
                        window.ReactDOM = ReactDOM;
                        window.createRoot = createRoot;

                        // Register components with Mingle
                        ${registrations.join('\n')}
                    `,
                    map: null
                };
            }
        },

        // Generate component manifest for debugging
        closeBundle: () => {
            const manifest = {
                timestamp: new Date().toISOString(),
                viteVersion: process.env.VITE_VERSION,
                nodeVersion: process.version,
            };

            fs.writeFileSync(
                'public/mantine-build-info.json',
                JSON.stringify(manifest, null, 2)
            );
        }
    };
}
