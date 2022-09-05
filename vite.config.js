import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    "server": {
        "host": "0.0.0.0",
        "watch": {
            "ignored": [
                "!**/vendor/**"
            ]
        },
        "port": 3001
    },
    "plugins": [
        laravel([
            "resources/js/app.js",
            "resources/css/app.css"
        ])
    ]
});
