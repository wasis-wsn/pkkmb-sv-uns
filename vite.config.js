import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path'

export default defineConfig({
    server: {
        https: true,
        host: 'pkkmb.kodesora.my.id',
        hmr: {
            host: 'pkkmb.kodesora.my.id',
            protocol: 'wss'
        }
    },
    base: process.env.NODE_ENV === 'production' 
    ? 'https://pkkmb.kodesora.my.id/build/' 
    : '/build/',
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
