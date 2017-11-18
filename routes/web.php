<?php
use App\Mail\Register;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('auth.login', function () {
	Mail::to(where_email(User::first('email')))->send(new Register);
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('tasks', 'TaskController');     //Route for Task


//Route and Group-route for Ticketing
Route::group(
[
    'prefix' => 'tickets', 'middleware' => 'auth'
], function () {

    Route::get('/', 'TicketingController@index')
         ->name('tickets.tickets.index');

    Route::get('/create','TicketingController@create')
         ->name('tickets.tickets.create');

    Route::get('/show/{ticketing}','TicketingController@show')
         ->name('tickets.tickets.show')
         ->where('id', '[0-9]+');

    Route::any('/{ticketing}/edit','TicketingController@edit')
         ->name('tickets.tickets.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'TicketingController@store')
         ->name('tickets.tickets.store');
               
    Route::any('tickets/{ticketing}', 'TicketingController@update')
         ->name('tickets.tickets.update')
         ->where('id', '[0-9]+');

    Route::delete('/tickets/{ticketing}','TicketingController@destroy')
         ->name('tickets.tickets.destroy')
         ->where('id', '[0-9]+');

});


//Route and Group-route for AssetCategories
Route::group(
[
    'prefix' => 'asset_categories', 'middleware' => 'auth'
], function () {

    Route::get('/', 'AssetCategoriesController@index')
         ->name('asset_categories.asset_category.index');

    Route::get('/create','AssetCategoriesController@create')
         ->name('asset_categories.asset_category.create');

    Route::get('/show/{assetCategory}','AssetCategoriesController@show')
         ->name('asset_categories.asset_category.show')
         ->where('id', '[0-9]+');

    Route::get('/{assetCategory}/edit','AssetCategoriesController@edit')
         ->name('asset_categories.asset_category.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'AssetCategoriesController@store')
         ->name('asset_categories.asset_category.store');
               
    Route::put('asset_category/{assetCategory}', 'AssetCategoriesController@update')
         ->name('asset_categories.asset_category.update')
         ->where('id', '[0-9]+');

    Route::delete('/asset_category/{assetCategory}','AssetCategoriesController@destroy')
         ->name('asset_categories.asset_category.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'projects', 'middleware' => 'auth'
], function () {

    Route::get('/', 'ProjectsController@index')
         ->name('projects.project.index');

    Route::get('/create','ProjectsController@create')
         ->name('projects.project.create');

    Route::get('/show/{project}','ProjectsController@show')
         ->name('projects.project.show')
         ->where('id', '[0-9]+');

    Route::get('/{project}/edit','ProjectsController@edit')
         ->name('projects.project.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'ProjectsController@store')
         ->name('projects.project.store');
               
    Route::put('project/{project}', 'ProjectsController@update')
         ->name('projects.project.update')
         ->where('id', '[0-9]+');

    Route::delete('/project/{project}','ProjectsController@destroy')
         ->name('projects.project.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'roles', 'middleware' => 'auth'
], function () {

    Route::get('/', 'RolesController@index')
         ->name('roles.roles.index');

    Route::get('/create','RolesController@create')
         ->name('roles.roles.create');

    Route::get('/show/{roles}','RolesController@show')
         ->name('roles.roles.show')
         ->where('id', '[0-9]+');

    Route::get('/{roles}/edit','RolesController@edit')
         ->name('roles.roles.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'RolesController@store')
         ->name('roles.roles.store');
               
    Route::put('roles/{roles}', 'RolesController@update')
         ->name('roles.roles.update')
         ->where('id', '[0-9]+');

    Route::delete('/roles/{roles}','RolesController@destroy')
         ->name('roles.roles.destroy')
         ->where('id', '[0-9]+');

});
