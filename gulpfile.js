var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('fapp.scss', './public/css/fapp.css')
        .sass('app.scss', './public/css/app.css')
        .scripts([
            'sweetalert.min.js',
            'cart.js',
            'lodash.min.js',
            'dropzone.js',
            'dropzonemanager.js',
            'velocity.min.js'
        ], './public/js/all.js')
        .scripts([
            'cartmanager.js'
        ], './public/js/cartmanager.js')
        .version(['css/app.css', 'css/fapp.css']);
});
