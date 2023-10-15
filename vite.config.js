import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/style.css', 'resources/js/login.js'],
            refresh: true,
        }),
    ],
    envDir:'./'
});
