const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(function(mix){
   mix.copy(
       'public/bower_components/bootstrap/dist/css/bootstrap.min.css',
       'public/css/bootstrap.min.css'
   ),
   mix.copy(
       'bower_components/jquery-typeahead/dist/jquery.typeahead.min.css',
       'public/css/jquery.typeahead.min.css'
   ),
   mix.copy(
       'public/bower_components/bootstrap/dist/js/bootstrap.min.js',
       'public/js/bootstrap.min.js'
   ),
   mix.copy(
       'bower_components/jquery-typeahead/dist/jquery.typeahead.min.js',
       'public/js/jquery.typeahead.min.js'
   ),
   mix.copy(
       'bower_components/jquery-typeahead/dist/jquery.min.js',
       'public/js/jquery.min.js'
   )

});
