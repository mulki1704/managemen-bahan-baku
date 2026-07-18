import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/auth.css',
                'resources/css/dashboard.css',
                'resources/css/bahan-baku.css',
                'resources/css/bom.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
