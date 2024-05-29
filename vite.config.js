import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            "ziggy-js": path.resolve("vendor/tightenco/ziggy"),
        },
    },
    server: {
        host: "0.0.0.0",
        hmr: {
            host: "localhost",
            clientPort: 42069, // The exposed port of your `app` service
        },
    },
});
