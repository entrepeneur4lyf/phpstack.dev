<?php

namespace MantineLivewire\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;
use MantineLivewire\Support\ViteConfigMerger;
use Illuminate\Support\Str;
use RuntimeException;
use function Laravel\Prompts\select;

class MantineLivewireInstallCommand extends Command
{
    protected $signature = 'mantinelivewire:install';

    protected $description = 'Install Mantine components for Laravel Livewire';

    protected $ds = DIRECTORY_SEPARATOR;

    public function handle()
    {
        $this->info("🚀 Mantine Blade Installer\n");

        // Get package manager preference
        $packageManagerCommand = $this->askForPackageInstaller();

        // Install PHP dependencies
        $this->installPhpDependencies();

        $this->publishAssets();

        // Setup React and Mantine
        $this->setupReactMantine($packageManagerCommand);

        // Copy stubs and example components
        $this->copyStubs();

        // Setup configuration
        $this->publishConfig();

        // Publish base layout
        $this->publishBaseLayout();

        // Clear view cache
        Artisan::call('view:clear');

        $this->info("\n✅ Installation complete!");
        $this->info("\nRun `{$this->getDevCommand($packageManagerCommand)}` to start development server");
        $this->info("\nTo install a layout, run: php artisan mantinelivewire:layout");
    }

    protected function installPhpDependencies()
    {
        $this->info("\nInstalling PHP dependencies...");

        Process::run("composer require ijpatricio/mingle", function (string $type, string $output) {
            echo $output;
        })->throw();

        $this->info("\nRunning Mingle installer...");
        Artisan::call('mingle:install');
    }

    protected function publishAssets()
    {
        $this->info("\nPublishing assets...");

        // Publish assets and config
        Artisan::call('vendor:publish', [
            '--tag' => 'mantinelivewire-assets',
            '--force' => true
        ]);

        // Publish stubs
        Artisan::call('vendor:publish', [
            '--tag' => 'mantinelivewire-stubs',
            '--force' => true
        ]);
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
            "@tiptap/extension-bold",
            "@tiptap/extension-code",
            "@tiptap/extension-image",
            "@tiptap/extension-table",
            "@tiptap/extension-heading",
            "@tiptap/extension-blockquote",
            "@tiptap/extension-horizontal-rule",
            "@tiptap/extension-history",
            "@tiptap/extension-undo",
            "@tiptap/extension-redo",
            "@tiptap/extension-clipboard",
            "@tiptap/extension-trailing-node",
            "@tiptap/extension-hard-break",
            "@tiptap/extension-youtube",
            "@tiptap/extension-character-count",
            "@tiptap/extension-typography",
            "@tiptap/extension-font-family",
            "@tiptap/extension-bubble-menu",
            "@tiptap/extension-floating-menu",
            "@tiptap/extension-emoji",
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
            "zod"
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

        // Setup Vite config
        $this->setupViteConfig();
    }

    protected function setupViteConfig()
    {
        $jsConfigPath = base_path('vite.config.js');
        $mjsConfigPath = base_path('vite.config.mjs');
        $ourViteConfig = File::get(__DIR__ . '/../../stubs/vite.config.mjs');
        
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
    }

    protected function publishConfig()
    {
        $this->info("\nPublishing configuration...");
        
        Artisan::call('vendor:publish', [
            '--tag' => 'mantinelivewire.config',
            '--force' => true
        ]);
    }

    protected function publishBaseLayout()
    {
        $this->info("\nPublishing base layout...");

        $layoutsPath = resource_path('views/layouts');
        if (!File::exists($layoutsPath)) {
            File::makeDirectory($layoutsPath, 0755, true);
        }

        $baseLayoutPath = resource_path('views/layouts/base.blade.php');
        if (!File::exists($baseLayoutPath)) {
            File::copy(__DIR__ . '/../../resources/views/layouts/base.blade.php', $baseLayoutPath);
        }
    }

    protected function copyStubs()
    {
        $this->info("\nCopying components and stubs...");

        // Create necessary directories
        $jsPath = resource_path('js');
        if (!File::exists($jsPath)) {
            File::makeDirectory($jsPath, 0755, true);
        }

        // Copy React components (excluding Custom directory)
        $componentsPath = resource_path('js/Components');
        if (!File::exists($componentsPath)) {
            File::makeDirectory($componentsPath, 0755, true);
        }

        $stubComponentsPath = __DIR__ . '/../../stubs/js/Components';
        if (File::exists($stubComponentsPath)) {
            // Get all directories except Custom
            $directories = array_filter(File::directories($stubComponentsPath), function($dir) {
                return !Str::endsWith($dir, 'Custom');
            });

            foreach ($directories as $dir) {
                $componentName = basename($dir);
                File::copyDirectory($dir, $componentsPath . '/' . $componentName);
            }
        }

        // Copy example components
        $examplesPath = __DIR__ . '/../../stubs/examples';
        if (File::exists($examplesPath)) {
            $files = File::files($examplesPath);
            foreach ($files as $file) {
                File::copy($file->getPathname(), app_path('Livewire/' . $file->getFilename()));
            }
        }

        // Copy JS stubs
        $stubsPath = __DIR__ . '/../../stubs/js';
        if (File::exists($stubsPath)) {
            // Get all files/directories except Components directory
            $items = array_filter(File::allFiles($stubsPath), function($item) {
                return !Str::startsWith($item->getRelativePath(), 'Components');
            });

            foreach ($items as $item) {
                $relativePath = $item->getRelativePath();
                $targetPath = resource_path('js/' . ($relativePath ? $relativePath . '/' : ''));
                
                if (!File::exists($targetPath)) {
                    File::makeDirectory($targetPath, 0755, true);
                }
                
                File::copy($item->getPathname(), $targetPath . $item->getFilename());
            }
        }

        // Create app.js if it doesn't exist
        $appJsPath = resource_path('js/app.js');
        if (!File::exists($appJsPath)) {
            File::put($appJsPath, $this->getAppJs());
        }

        // Create app.css if it doesn't exist
        $appCssPath = resource_path('css/app.css');
        if (!File::exists($appCssPath)) {
            File::put($appCssPath, $this->getAppCss());
        }
    }

    protected function getPostCssConfig(): string
    {
        return File::get(__DIR__ . '/../../stubs/postcss.config.js');
    }

    protected function getAppJs(): string
    {
        return File::get(__DIR__ . '/../../stubs/js/app.js');
    }

    protected function getAppCss(): string
    {
        return File::get(__DIR__ . '/../../stubs/css/app.css');
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
