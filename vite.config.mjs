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
                'resources/js/mantineHooks.js',
            ],
            refresh: true,
        }),
        react(),
        mantinePlugin(),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
        },
    },
    optimizeDeps: {
        include: ['@mantine/core', '@mantine/hooks'],
    },
});
