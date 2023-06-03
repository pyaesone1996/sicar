import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "resources/scss/app.scss",
                "resources/assets/scss/style.scss",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            fontawsome: path.resolve(__dirname, "resources/assets/fonts"),
        },
    },
});
