import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/news.css',
                'resources/js/app.js',
                'resources/js/chartExpesesDates.js',
                'resources/js/barChartProfitBien.js',
                'resources/js/chartBtwIncExp.js',
                'resources/js/noticias.js',
                'resources/js/chartIncomesDates.js',
            ],
            refresh: true,
        }),
    ],
});
