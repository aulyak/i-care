const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
  .js('resources/js/dashboard.js', 'public/js')
  .js('resources/js/view_age.js', 'public/js')
  .js('resources/js/view_witel.js', 'public/js')
  .js('resources/js/view_update.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .sass('resources/sass/bootstrap.scss', 'public/css')
  .postCss('resources/css/landing_page.css', 'public/css')
  .sourceMaps();
