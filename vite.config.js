import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/admin/css/dashboard.css',
                'resources/admin/js/dashboard.js',
                'resources/sass/app.scss',
                'resources/js/bootstrap.js',
                'resources/js/color-modes.js',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
