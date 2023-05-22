import {defineConfig} from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            hotFile: '../../public/hot',
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
            ],
            buildDirectory: "Starify",
        }),
        {
            name: "blade",
            handleHotUpdate({file, server}) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
    ],
    server: {
        hmr: {
            host: 'localhost'
        }
    },
    optimizeDeps: {
        include: [],
    },
    resolve: {
        alias: {
            '@': '/resources/js',

        }
    },
    css: {
        postcss: {
            plugins: [
                require("tailwindcss")({
                    config: path.resolve(__dirname, "tailwind.config.js"),
                }),
            ],
        },
    },
});



