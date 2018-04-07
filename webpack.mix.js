let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([

    'resources/assets/css/libs/vendor.min.css',
    'resources/assets/css/libs/elephant.min.css',
    'resources/assets/css/libs/application.min.css',
    'resources/assets/css/libs/demo.min.css'

], 'public/css/libs.css');

mix.scripts([

    'resources/assets/js/libs/vendor.min.js',
    'resources/assets/js/libs/elephant.min.js',
    'resources/assets/js/libs/application.min.js',
    'resources/assets/js/libs/demo.min.js'

], 'public/js/libs.js');

