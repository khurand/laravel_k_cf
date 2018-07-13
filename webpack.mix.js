
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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');


let mix = require('laravel-mix');
mix.scripts([
    'resources/assets/js/jquery-3.3.1.min.js', 
    'resources/assets/js/bootstrap.js', 
    'resources/assets/js/bootstrap.bundler.min.js',
    'resources/assets/js/script.js'
], 'public/js/app.js')
.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/app.css'
], 'public/css/app.css');
