import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig({
    root: path.resolve(import.meta.dirname),
    resolve: {
        alias: {
            "~bootstrap": path.resolve(
                import.meta.dirname,
                "node_modules/bootstrap"
            ),
            "~bootstrap-icons": path.resolve(
                import.meta.dirname,
                "node_modules/bootstrap-icons"
            ),
        },
    },
    plugins: [
        laravel({
            input: ["resources/scss/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
