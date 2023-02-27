import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { viteCommonjs } from '@originjs/vite-plugin-commonjs';



export default defineConfig({
    plugins: [
        viteCommonjs(),
        vue({
            template: {
                compilerOptions: {
                    isCustomElement: (tag) => ['b-pagination', 'b-table'].includes(tag),
                    // isCustomElement: (tag) => ['b-table'].includes(tag),
                }
            }
        }),
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
    ],
});