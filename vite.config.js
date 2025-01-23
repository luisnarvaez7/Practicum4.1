import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: 'localhost',
        port: 3001, // Asegúrate de que sea el puerto correcto
        proxy: {
            '/api': 'http://localhost', // Proxiar solo las rutas de la API de Laravel
            '/sanctum/csrf-cookie': 'http://localhost', // Si usas Sanctum, no olvides incluir esta ruta también
        },
        headers: {
            'Access-Control-Allow-Origin': '*',
        },
    },
});
