import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import mkcert from "vite-plugin-mkcert";

const host = "127.0.0.1";
const port = "8000";

export default defineConfig({
    plugins: [
        mkcert(),
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        https: true,
        proxy: {
            "^(?!(\/\\@vite|\/resources|\/node_modules))": {
                target: `http://${host}:${port}`,
            },
        },
        host,
        port: 5173,
        hmr: { host },
        watch: {
            ignored: ["**/storage/framework/views/**"],
        },
    },
});
