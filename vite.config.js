import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

//Importamos el plugin de vue
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        //Agregamos el plugin de vue
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            //Cuando un archivo sufra un cambio se referescará la página
            refresh: true,
        }),
    ],
});
