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

mix.copy('/node_modules/bootstrap-switch/dist/js/bootstrap-switch.js', 'public/js');
mix.copy('/node_modules/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css', 'public/css');
mix.copy('/node_modules/animate.css/animate.css', 'public/css');

mix.copy('/node_modules/sweetalert/dist/sweetalert.css', 'public/css');
mix.copy('/node_modules/sweetalert/dist/sweetalert.min.js', 'public/js');
