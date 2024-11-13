<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;
use App\Support\ViteConfigMerger;
use Illuminate\Support\Str;
use RuntimeException;
use function Laravel\Prompts\select;

class MantineLivewireInstallCommand extends Command
{
    protected $signature = 'mantinelivewire:install';

    protected $description = 'Install Mantine components for Laravel Livewire';

    public function handle()
    {
        $this->info("🚀 Mantine Blade Installer\n");

        // Get package manager preference
        $packageManagerCommand = $this->askForPackageInstaller();

        // Setup React and Mantine
        $this->setupReactMantine($packageManagerCommand);

        // Setup configuration
        $this->setupViteConfig();

        $this->info("\n✅ Installation complete!");
        $this->info("\nRun `{$this->getDevCommand($packageManagerCommand)}` to start development server");
    }

    protected function setupReactMantine(string $packageManagerCommand)
    {
        $this->info("\nInstalling React and Mantine...");

        $dependencies = [
            // Core Mantine packages
            "@mantine/core",
            "@mantine/hooks",
            "@mantine/form",
            "@mantine/dates",
            "dayjs",
            "@mantine/charts",
            "recharts@2",
            "@mantine/notifications",
            "@mantine/code-highlight",
            "@mantine/dropzone",
            "@mantine/carousel",
            "embla-carousel-react@^7.1.0",
            "@mantine/spotlight",
            "@mantine/modals",
            "@mantine/nprogress",
            "@mantine/tiptap",
            
            // TipTap core
            "@tiptap/core",
            "@tiptap/react",
            "@tiptap/pm",
            "@tiptap/starter-kit",
            
            // TipTap extensions
            "@tiptap/extension-code-block-lowlight",
            "@tiptap/extension-color",
            "@tiptap/extension-text-style",
            "@tiptap/extension-placeholder",
            "@tiptap/extension-text-align",
            "@tiptap/extension-underline",
            "@tiptap/extension-superscript",
            "@tiptap/extension-subscript",
            "@tiptap/extension-highlight",
            "@tiptap/extension-task-item",
            "@tiptap/extension-task-list",
            "@tiptap/extension-mention",
            "@tiptap/suggestion",
            "@tiptap/extension-bold",
            "@tiptap/extension-code",
            "@tiptap/extension-code-block",
            "highlight.js@^11",
            "@tiptap/extension-image",
            "@tiptap/extension-table",
            "@tiptap/extension-heading",
            "@tiptap/extension-blockquote",
            "@tiptap/extension-horizontal-rule",
            "@tiptap/extension-history",
            "@tiptap/extension-hard-break",
            "@tiptap/extension-youtube",
            "@tiptap/extension-character-count",
            "@tiptap/extension-typography",
            "@tiptap/extension-font-family",
            "@tiptap/extension-bubble-menu",
            "@tiptap/extension-floating-menu",
            "@tiptap/extension-table-row",
            "@tiptap/extension-table-cell",
            "@tiptap/extension-table-header",
            "@tiptap/extension-link",
            
            // Other dependencies
            "@tabler/icons-react",
            "lowlight",
            "react",
            "react-dom",
            "react-querybuilder",
            "@gfazioli/mantine-flip",
            "mantine-contextmenu",
            "clsx",
            "zod",
            "tailwindcss",
            "@tailwindcss/forms"
        ];

        $devDependencies = [
            "@vitejs/plugin-react",
            "@types/react",
            "@types/react-dom",
            "typescript",
            "postcss",
            "postcss-preset-mantine",
            "postcss-simple-vars",
            "autoprefixer"
        ];

        // Install dependencies
        Process::run("$packageManagerCommand " . implode(" ", $dependencies), function (string $type, string $output) {
            echo $output;
        })->throw();

        // Install dev dependencies
        $devCommand = str_replace(' install', ' install -D', $packageManagerCommand);
        $devCommand = str_replace(' add', ' add -D', $devCommand);
        Process::run("$devCommand " . implode(" ", $devDependencies), function (string $type, string $output) {
            echo $output;
        })->throw();
    }

    protected function setupViteConfig()
    {
        $this->info("\nSetting up Vite configuration...");

        $jsConfigPath = base_path('vite.config.js');
        $mjsConfigPath = base_path('vite.config.mjs');
        $ourViteConfig = $this->getViteConfig();
        
        // If user has a .js config, merge it with ours
        if (File::exists($jsConfigPath)) {
            $userViteConfig = File::get($jsConfigPath);
            
            // Use ViteConfigMerger to merge configs
            $mergedConfig = ViteConfigMerger::merge($userViteConfig, $ourViteConfig);
            
            // Create backup of original .js config
            File::copy($jsConfigPath, $jsConfigPath . '.bak');
            
            // Delete original .js config
            File::delete($jsConfigPath);
            
            // Write merged config to .mjs
            File::put($mjsConfigPath, $mergedConfig);
            
            $this->info("\nConverted vite.config.js to vite.config.mjs. Original backed up to vite.config.js.bak");
        }
        // If user has a .mjs config, merge it with ours
        elseif (File::exists($mjsConfigPath)) {
            $userViteConfig = File::get($mjsConfigPath);
            
            // Use ViteConfigMerger to merge configs
            $mergedConfig = ViteConfigMerger::merge($userViteConfig, $ourViteConfig);
            
            // Create backup of original .mjs config
            File::copy($mjsConfigPath, $mjsConfigPath . '.bak');
            
            // Write merged config
            File::put($mjsConfigPath, $mergedConfig);
            
            $this->info("\nMerged Vite configurations. Original backed up to vite.config.mjs.bak");
        }
        // No existing config, just use ours
        else {
            File::put($mjsConfigPath, $ourViteConfig);
        }

        // Create postcss.config.js if it doesn't exist
        $postcssConfig = base_path('postcss.config.js');
        if (!File::exists($postcssConfig)) {
            File::put($postcssConfig, $this->getPostCssConfig());
        }

        // Create Mantine plugin
        $mantinePluginPath = base_path('vite-plugin-mantine.mjs');
        if (!File::exists($mantinePluginPath)) {
            File::put($mantinePluginPath, $this->getMantinePlugin());
        }

        // Create or update tailwind.config.js
        $tailwindConfig = base_path('tailwind.config.js');
        if (!File::exists($tailwindConfig)) {
            File::put($tailwindConfig, $this->getTailwindConfig());
        }
    }

    protected function getViteConfig(): string
    {
        return <<<'EOT'
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import mantinePlugin from './vite-plugin-mantine.mjs';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/MantineLiveWire/js/mantineHooks.js',
            ],
            refresh: true,
        }),
        react(),
        mantinePlugin(),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            '@mantine': '/resources/MantineLiveWire/custom/react/components',
        },
    },
    optimizeDeps: {
        include: [
            '@mantine/core',
            '@mantine/hooks',
            '@mantine/form',
            '@mantine/dates',
            '@mantine/notifications',
            '@mantine/code-highlight',
            '@mantine/tiptap',
            '@mantine/carousel',
            '@mantine/spotlight',
            '@mantine/modals',
            '@mantine/nprogress',
            '@tiptap/react',
            '@tiptap/pm',
            '@tiptap/starter-kit',
            '@tiptap/suggestion',
            'highlight.js',
        ],
    },
});
EOT;
    }

    protected function getPostCssConfig(): string
    {
        return <<<'EOT'
module.exports = {
  plugins: {
    'tailwindcss/nesting': {},
    tailwindcss: {},
    'postcss-preset-mantine': {},
    'postcss-simple-vars': {
      variables: {
        'mantine-breakpoint-xs': '36em',
        'mantine-breakpoint-sm': '48em',
        'mantine-breakpoint-md': '62em',
        'mantine-breakpoint-lg': '75em',
        'mantine-breakpoint-xl': '88em',
      },
    },
    'autoprefixer': {},
  },
};
EOT;
    }

    protected function getTailwindConfig(): string
    {
        return <<<'EOT'
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.jsx',
  ],
  corePlugins: {
    preflight: false, // Disable Tailwind's reset to avoid conflicts with Mantine
  },
  important: '#tailwind', // Scope Tailwind styles to avoid conflicts
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
EOT;
    }

    protected function getMantinePlugin(): string
    {
        return <<<'EOT'
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
EOT;
    }

    protected function askForPackageInstaller(): string
    {
        $os = PHP_OS;
        $findCommand = stripos($os, 'WIN') === 0 ? 'where' : 'which';

        $yarn = Process::run($findCommand . ' yarn')->output();
        $npm = Process::run($findCommand . ' npm')->output();
        $bun = Process::run($findCommand . ' bun')->output();
        $pnpm = Process::run($findCommand . ' pnpm')->output();

        $options = [];

        if (Str::of($yarn)->isNotEmpty()) {
            $options = array_merge($options, ['yarn add' => 'yarn']);
        }

        if (Str::of($npm)->isNotEmpty()) {
            $options = array_merge($options, ['npm install' => 'npm']);
        }

        if (Str::of($bun)->isNotEmpty()) {
            $options = array_merge($options, ['bun install' => 'bun']);
        }

        if (Str::of($pnpm)->isNotEmpty()) {
            $options = array_merge($options, ['pnpm install' => 'pnpm']);
        }

        if (count($options) == 0) {
            $this->error("You need yarn, npm, bun, or pnpm installed.");
            exit;
        }

        return select(
            label: 'Choose package manager:',
            options: $options
        );
    }

    protected function getDevCommand(string $packageManagerCommand): string
    {
        $manager = str_replace(' install', '', $packageManagerCommand);
        $manager = str_replace(' add', '', $manager);
        
        return match($manager) {
            'npm' => 'npm run dev',
            'yarn' => 'yarn dev',
            'bun' => 'bun dev',
            'pnpm' => 'pnpm dev',
            default => 'npm run dev'
        };
    }
}
