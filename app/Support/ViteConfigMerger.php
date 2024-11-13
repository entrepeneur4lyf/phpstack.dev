<?php

namespace MantineLivewire\Support;

use Illuminate\Support\Str;

class ViteConfigMerger
{
    /**
     * Merge two Vite configurations
     */
    public static function merge(string $original, string $new): string
    {
        // If original is empty, just return new config
        if (empty(trim($original))) {
            return $new;
        }

        // Parse both configs
        $originalParts = self::parseConfig($original);
        $newParts = self::parseConfig($new);

        // Build merged config
        $output = [];

        // Add imports (unique)
        $imports = array_unique(array_merge($originalParts['imports'], $newParts['imports']));
        foreach ($imports as $import) {
            $output[] = $import;
        }
        if (!empty($imports)) {
            $output[] = '';
        }

        // Start config object
        $output[] = 'export default defineConfig({';

        // Merge plugins
        if (!empty($originalParts['plugins']) || !empty($newParts['plugins'])) {
            $output[] = '    plugins: [';
            
            // Merge Laravel plugin inputs
            $laravelPlugin = self::mergeLaravelPlugin(
                self::findLaravelPlugin($originalParts['plugins']),
                self::findLaravelPlugin($newParts['plugins'])
            );
            if ($laravelPlugin) {
                $output[] = self::indentLines($laravelPlugin, 8);
            }
            
            // Add other plugins from original (except Laravel)
            foreach ($originalParts['plugins'] as $plugin) {
                if (!Str::contains($plugin, 'laravel(')) {
                    $output[] = self::indentLines($plugin, 8);
                }
            }
            
            // Add new plugins (if not already present)
            foreach ($newParts['plugins'] as $plugin) {
                if (!Str::contains($plugin, 'laravel(')) {
                    $pluginName = self::getPluginName($plugin);
                    if (!self::hasPlugin($originalParts['plugins'], $pluginName)) {
                        $output[] = self::indentLines($plugin, 8);
                    }
                }
            }
            
            $output[] = '    ],';
        }

        // Merge resolve configuration
        if (!empty($originalParts['resolve']) || !empty($newParts['resolve'])) {
            $output[] = '    resolve: {';
            $output[] = '        alias: {';
            
            // Merge alias configurations
            $aliases = array_merge(
                self::extractAliases($originalParts['resolve']),
                self::extractAliases($newParts['resolve'])
            );
            
            foreach ($aliases as $key => $value) {
                $output[] = "            '{$key}': '{$value}',";
            }
            
            $output[] = '        },';
            $output[] = '    },';
        }

        // Merge optimizeDeps configuration
        if (!empty($originalParts['optimizeDeps']) || !empty($newParts['optimizeDeps'])) {
            $output[] = '    optimizeDeps: {';
            $output[] = '        include: [';
            
            // Merge include arrays
            $includes = array_unique(array_merge(
                self::extractIncludes($originalParts['optimizeDeps']),
                self::extractIncludes($newParts['optimizeDeps'])
            ));
            
            foreach ($includes as $include) {
                $output[] = "            '{$include}',";
            }
            
            $output[] = '        ],';
            $output[] = '    },';
        }

        // Merge CSS config
        if (!empty($originalParts['css']) || !empty($newParts['css'])) {
            $output[] = '    css: {';
            $output[] = '        postcss: {';
            $output[] = '            plugins: [';
            
            // Merge postcss plugins
            $plugins = array_unique(array_merge(
                self::extractPostcssPlugins($originalParts['css']),
                self::extractPostcssPlugins($newParts['css'])
            ));
            
            foreach ($plugins as $plugin) {
                $output[] = "                {$plugin},";
            }
            
            $output[] = '            ],';
            $output[] = '        },';
            $output[] = '    },';
        }

        // Add any other configurations
        foreach (array_merge($originalParts['other'], $newParts['other']) as $config) {
            $output[] = self::indentLines($config, 4);
        }

        // Close config object
        $output[] = '});';

        return implode("\n", $output);
    }

    /**
     * Parse Vite config into parts
     */
    protected static function parseConfig(string $config): array
    {
        $parts = [
            'imports' => [],
            'plugins' => [],
            'resolve' => '',
            'optimizeDeps' => '',
            'css' => '',
            'other' => [],
        ];

        // Extract imports
        preg_match_all('/^import .+?;$/m', $config, $matches);
        $parts['imports'] = $matches[0];

        // Extract plugins section
        if (preg_match('/plugins:\s*\[(.*?)\],/s', $config, $matches)) {
            $plugins = trim($matches[1]);
            $parts['plugins'] = self::splitPlugins($plugins);
        }

        // Extract resolve section
        if (preg_match('/resolve:\s*{(.*?)},/s', $config, $matches)) {
            $parts['resolve'] = trim($matches[1]);
        }

        // Extract optimizeDeps section
        if (preg_match('/optimizeDeps:\s*{(.*?)},/s', $config, $matches)) {
            $parts['optimizeDeps'] = trim($matches[1]);
        }

        // Extract CSS section
        if (preg_match('/css:\s*{(.*?)},/s', $config, $matches)) {
            $parts['css'] = trim($matches[1]);
        }

        // Extract other configurations
        if (preg_match_all('/^\s*\w+:\s*{.*?},$/ms', $config, $matches)) {
            $parts['other'] = array_filter($matches[0], function($match) {
                return !Str::startsWith(trim($match), ['plugins:', 'resolve:', 'optimizeDeps:', 'css:']);
            });
        }

        return $parts;
    }

    /**
     * Find Laravel plugin configuration
     */
    protected static function findLaravelPlugin(array $plugins): ?string
    {
        foreach ($plugins as $plugin) {
            if (Str::contains($plugin, 'laravel(')) {
                return $plugin;
            }
        }
        return null;
    }

    /**
     * Merge Laravel plugin configurations
     */
    protected static function mergeLaravelPlugin(?string $original, ?string $new): ?string
    {
        if (!$original && !$new) {
            return null;
        }

        if (!$original) {
            return $new;
        }

        if (!$new) {
            return $original;
        }

        // Extract input arrays
        preg_match('/input:\s*\[(.*?)\]/s', $original, $originalMatches);
        preg_match('/input:\s*\[(.*?)\]/s', $new, $newMatches);

        $originalInputs = self::parseArray($originalMatches[1] ?? '');
        $newInputs = self::parseArray($newMatches[1] ?? '');

        // Merge inputs
        $mergedInputs = array_unique(array_merge($originalInputs, $newInputs));

        // Replace input array in original config
        return preg_replace(
            '/input:\s*\[.*?\]/s',
            'input: [' . implode(', ', array_map(fn($i) => "'{$i}'", $mergedInputs)) . ']',
            $original
        );
    }

    /**
     * Parse array string into array of values
     */
    protected static function parseArray(string $array): array
    {
        preg_match_all('/[\'"]([^\'"]+)[\'"]/', $array, $matches);
        return $matches[1] ?? [];
    }

    /**
     * Extract alias configurations
     */
    protected static function extractAliases(string $resolve): array
    {
        $aliases = [];
        if (preg_match('/alias:\s*{(.*?)}/s', $resolve, $matches)) {
            preg_match_all('/[\'"]([^\'"]+)[\'"]\s*:\s*[\'"]([^\'"]+)[\'"]/', $matches[1], $aliasMatches);
            $aliases = array_combine($aliasMatches[1] ?? [], $aliasMatches[2] ?? []);
        }
        return $aliases;
    }

    /**
     * Extract optimizeDeps includes
     */
    protected static function extractIncludes(string $optimizeDeps): array
    {
        $includes = [];
        if (preg_match('/include:\s*\[(.*?)\]/s', $optimizeDeps, $matches)) {
            preg_match_all('/[\'"]([^\'"]+)[\'"]/', $matches[1], $includeMatches);
            $includes = $includeMatches[1] ?? [];
        }
        return $includes;
    }

    /**
     * Split plugins string into array of individual plugin configurations
     */
    protected static function splitPlugins(string $plugins): array
    {
        $result = [];
        $current = '';
        $depth = 0;

        $lines = explode("\n", $plugins);
        foreach ($lines as $line) {
            $depth += substr_count($line, '{') - substr_count($line, '}');
            $current .= $line . "\n";
            
            if ($depth === 0 && !empty(trim($current))) {
                $result[] = rtrim($current);
                $current = '';
            }
        }

        return array_filter($result);
    }

    /**
     * Extract plugin name from configuration
     */
    protected static function getPluginName(string $plugin): string
    {
        if (preg_match('/^(\w+)\s*\(/', trim($plugin), $matches)) {
            return $matches[1];
        }
        if (preg_match('/name:\s*[\'"](\w+)[\'"]/', $plugin, $matches)) {
            return $matches[1];
        }
        return '';
    }

    /**
     * Check if plugins array already contains a plugin
     */
    protected static function hasPlugin(array $plugins, string $name): bool
    {
        foreach ($plugins as $plugin) {
            if (self::getPluginName($plugin) === $name) {
                return true;
            }
        }
        return false;
    }

    /**
     * Extract postcss plugins from CSS configuration
     */
    protected static function extractPostcssPlugins(string $css): array
    {
        $plugins = [];
        preg_match_all('/require\([\'"]([^\'"]+)[\'"]\)(?:\(.*?\))?/', $css, $matches);
        foreach ($matches[0] as $match) {
            $plugins[] = trim($match);
        }
        return $plugins;
    }

    /**
     * Indent lines of text
     */
    protected static function indentLines(string $text, int $spaces): string
    {
        $indent = str_repeat(' ', $spaces);
        $lines = explode("\n", $text);
        $lines = array_map(fn($line) => $indent . $line, $lines);
        return implode("\n", $lines);
    }
}
