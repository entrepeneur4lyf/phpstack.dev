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
    css: {
        postcss: {
            plugins: [
                require('tailwindcss'),
                require('autoprefixer'),
            ],
        },
    },
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
            'mantine-datatable',
            '@formkit/auto-animate',
            'motion/react',
        ],
    },
});
