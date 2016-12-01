const elixir = require('laravel-elixir');

// require('laravel-elixir-vue-2');

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

// elixir(mix => {
//     mix.sass('app.scss')
//        .webpack('app.js');
// });
elixir(mix => {
	mix.styles([
		'./resources/assets/lib/bootstrap/bootstrap.min.css',
		'./resources/assets/lib/cropper/cropper.min.css',
		'./resources/assets/lib/cropper/main.css',
		'./resources/assets/lib/city-picker/city-picker.css',
		'./resources/assets/lib/select2/select2.css',
		'./resources/assets/lib/select2/select2-bootstrap.css',
		'./resources/assets/lib/font-awesome/font-awesome.min.css',
		'./resources/assets/lib/datatables/dataTables.min.css',
		'./resources/assets/lib/datatables/buttons.dataTables.min.css',
		'./resources/assets/css/backend.css',
	], 'public/css/backend.css')
		.scripts([
			'./resources/assets/js/jquery.min.js',
			'./resources/assets/lib/bootstrap/bootstrap.min.js',
			'./resources/assets/lib/city-picker/city-picker.data.js',
			'./resources/assets/lib/city-picker/city-picker.js',
			'./resources/assets/lib/select2/select2.js',
			'./resources/assets/lib/datatables/dataTables.min.js',
			'./resources/assets/lib/datatables/dataTables.buttons.min.js',
			'./resources/assets/lib/datatables/buttons.server-side.js',
			'./resources/assets/lib/cropper/cropper.min.js',
			'./resources/assets/lib/cropper/main.js',
	], 'public/js/backend.js');

	mix.styles([
			'./resources/assets/lib/bootstrap/bootstrap.min.css',
		], 'public/css/frontend.css')
		.scripts([
			'./resources/assets/js/jquery.min.js',
			'./resources/assets/lib/bootstrap/bootstrap.min.js',
		], 'public/js/frontend.js');
});