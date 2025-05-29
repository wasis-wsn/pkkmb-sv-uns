import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path'

export default defineConfig({
    server: {
        https: true,
        host: 'localhost',
        port: 5173,
    },
    base: 'https://pkkmb.kodesora.my.id/',
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
          '@': '/resources/js',
          '@assets': path.resolve(__dirname, 'resources/assets'),
          '@css': path.resolve(__dirname, 'resources/css'),
        },
      },
});
