<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('/', ['middleware' => 'auth', function () {
	
    return view('welcome');
}]);

Route::get('acts/download/{path}', 'ActsController@getDownload');
Route::get('contracts/download/{path}', 'ContractsController@getDownload');


Route::auth();



Route::group( ['middleware' => ['role:SUPER_ADMIN,ADMIN'] ],  function () {

	
	Route::resource('owners', 'OwnersController', ['except' => [
    	'index', 'show'
	]]);
	Route::resource('contracts', 'ContractsController', ['except' => [
    	'index', 'show'
	]]);
	Route::resource('ownerships', 'OwnershipsController', ['except' => [
    	'index', 'show'
	]]);
	Route::resource('acts', 'ActsController', ['except' => [
    	'index', 'show'
	]]);
	Route::resource('technical-inspections', 'TechnicalInspectionsController', ['except' => [
    	'index', 'show'
	]]);
	Route::resource('runs', 'RunsController', ['except' => [
    	'index', 'show'
	]]);

	Route::resource('cars', 'CarsController', ['except' => [
    	'index', 'show'
	]]);

	Route::resource('departments', 'DepartmentsController', ['except' => [
    	'index', 'show'
	]]);
	
	Route::resource('sections', 'SectionsController', ['except' => [
    	'index', 'show'
	]]);

});

Route::resource('departments', 'DepartmentsController', ['only' => [
    'index', 'show'
]]);
Route::resource('sections', 'SectionsController', ['only' => [
    'index', 'show'
]]);
Route::resource('owners', 'OwnersController', ['only' => [
    'index', 'show'
]]);
Route::resource('contracts', 'ContractsController', ['only' => [
    'index', 'show'
]]);
Route::resource('ownerships', 'OwnershipsController', ['only' => [
    'index', 'show'
]]);
Route::resource('acts', 'ActsController', ['only' => [
    'index', 'show'
]]);
Route::resource('technical-inspections', 'TechnicalInspectionsController', ['only' => [
    'index', 'show'
]]);
Route::resource('runs', 'RunsController', ['only' => [
    'index', 'show'
]]);
Route::resource('cars', 'CarsController', ['only' => [
    'index', 'show'
]]);

Route::get('/home', 'HomeController@index');


Route::group( ['middleware' => ['role:SUPER_ADMIN,NO_USER'], 'middleware' => 'auth' ] ,  function () {
    
	Route::resource('admin/users', 'UsersController');


});


Route::resource('main', 'MainController');

Route::resource('main2', 'MainTwoController');

Route::resource('languages', 'LanguagesController');

Route::put('admin/users/language/{id}', 'UsersController@changeLanguage');


