import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/bootstrap.min.css', 'resources/css/app.css', 'resources/admin/css/dashboard.css', 'resources/js/bootstrap.bundle.min.js', 'resources/js/app.js', 'resources/js/color-modes.js', 'resources/admin/js/dashboard.js'],
            refresh: true,
        }),
    ],
});
