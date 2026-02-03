import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import basicSsl from '@vitejs/plugin-basic-ssl';

const host = '127.0.0.1';
const port = '8000';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        basicSsl(),
    ],
    server: {
        https: true,
        proxy: {
            '^(?!(\/\\@vite|\/resources|\/node_modules))': {
                target: `http://${host}:${port}`,
            },
        },
        host,
        port: 5173,
        hmr: { host },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
