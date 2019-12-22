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

    // Complies CSS
    mix.sass(
        'app.scss', //Source files
        'public/css', // Destination folder
        {includePaths: ['vendor/bower_components/foundation/scss']}
    );

    // Compile JavaScript
    mix.scripts(
        ['vendor/modernizr.js', 'vendor/jquery.js', 'foundation.min.js'], //source files
        'public/js/app.js', // destination file
        'vendor/bower_components/foundation/js/' // Source files base directory
    );

});
