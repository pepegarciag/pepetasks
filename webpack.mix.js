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

mix.sass('resources/assets/scss/main.scss', 'public/css');
mix.scripts([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', // bootstrap & popper.js
    'node_modules/moment/min/moment.min.js',
    'node_modules/fullcalendar/dist/fullcalendar.js', // [1]
    'node_modules/chart.js/dist/chart.min.js','resources/assets/js/vendor/jquery.min.js',
    'node_modules/dragula/dist/dragula.min.js','resources/assets/js/vendor/bootstrap.bundle.min.js',
    'node_modules/select2/dist/js/select2.full.min.js','resources/assets/js/vendor/moment.min.js',
    'node_modules/dropzone/dist/min/dropzone.min.js','resources/assets/js/vendor/chart.min.js',
    'node_modules/datatables.net/js/jquery.dataTables.js','resources/assets/js/vendor/dragula.min.js',
    'node_modules/@fengyuanchen/datepicker/dist/datepicker.min.js','resources/assets/js/vendor/select2.full.min.js',
    'node_modules/jqvmap/dist/jquery.vmap.min.js','resources/assets/js/vendor/dropzone.min.js',
    'node_modules/jqvmap/dist/maps/jquery.vmap.world.js','resources/assets/js/vendor/jquery.dataTables.js',
    'node_modules/jquery-match-height/dist/jquery.matchHeight-min.js',
    'resources/assets/js/vendor/fullcalendar.js',
    'resources/assets/js/vendor/datepicker.min.js',
    'resources/assets/js/vendor/jquery.vmap.min.js',
    'resources/assets/js/vendor/jquery.vmap.world.js',
    'resources/assets/js/vendor/jquery.matchHeight-min.js',
    'resources/assets/js/fullcalendar-custom.js',
    'resources/assets/js/chart-custom.js',
    'resources/assets/js/sidebar.js',
    'resources/assets/js/switch.js',
    'resources/assets/js/toggle.js',
    'resources/assets/js/todo.js',
    'resources/assets/js/main.js',
    'resources/assets/js/events.js',
], 'public/js/main.min.js');