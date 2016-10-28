const elixir = require('laravel-elixir');

require('laravel-elixir-materialize-css');
require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
       .materialize()
       .webpack('app.js')
       .browserSync({
        	proxy: 'localhost',
        	port: 8000
	});
});
