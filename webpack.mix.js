const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

/*
mix.js('resources/front/js/jquery-3.5.1.slim.js', 'public/js')
    .js('resources/front/js/bootstrap.js', 'public/js')
    .postCss('resources/front/css/bootstrap.css', 'public/css')
    .postCss('resources/front/css/main.css', 'public/css')
    .copyDirectory('resources/front/img', 'public/img');
*/
//Обьединение файлов в один для уменьшения HTTP запросов и ускоряя работу приложения
mix.styles([
        'resources/front/css/bootstrap.css',
        'resources/front/css/main.css'
    ], 'public/css/styles.css');

mix.copyDirectory('resources/front/img', 'public/img');

mix.browserSync('laravel-app');
