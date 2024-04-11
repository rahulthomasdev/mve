import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['public/sass/frontend/custom.scss', 'resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
