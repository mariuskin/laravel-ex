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
    mix.less('app.less')
    	.less('../bower/datatables.net-dt/css/jquery.dataTables.min.css')
    	.less('../bower/datatables.net-bs/css/dataTables.bootstrap.min.css')
    	.less('../bower/bootstrap/dist/css/bootstrap.css');

	mix.sass('app.scss');

	mix.copy('resources/assets/bower/datatables.net-dt/images', 'public/images');
    
    mix.scripts('../bower/jquery/dist/jquery.min.js')
    	.scripts('../bower/bootstrap/dist/js/bootstrap.min.js')
        .scripts('../bower/jquery/dist/jquery.min.js')
        .scripts('../bower/datatables.net/js/jquery.dataTables.min.js')
        .scripts('../bower/datatables.net-bs/js/dataTables.bootstrap.min.js')
        .scripts('../bower/jquery-ui/jquery-ui.min.js')
		.browserSync({  proxy: 'localhost:8000' });

   
});
