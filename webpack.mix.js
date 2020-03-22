const mix = require('laravel-mix');
require('laravel-mix-purgecss');

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

mix.js('resources/js/app.js', 'public/assets/js')
    .sass('resources/sass/app.scss', 'public/assets/css')
    .copyDirectory("resources/images", "public/assets/images")
    .copyDirectory("resources/avatars", "public/assets/avatars");

mix.copy('node_modules/tabler-ui/dist/assets/css/dashboard.css', 'public/assets/css');
mix.copy('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css', 'public/assets/css');
mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/assets/js');
