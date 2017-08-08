<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getcities/{state_id}', 'CityController@cityFilter')->name('getcities');
Route::get('/getsubtypepets/{id}', 'SubTypePetController@subTypePetFilter')->name('getsubtypepets');
Route::get('/go-missed', 'MainController@missed')->name('go-missed');
Route::get('/go-found', 'MainController@found')->name('go-found');
Route::get('/found-document', 'MainController@found_document')->name('found-document');
Route::get('/search-document', 'MainController@search_document')->name('search-document');
Route::get('/found-pet', 'MainController@found_pet')->name('found-pet');
Route::get('/search-pet', 'MainController@search_pet')->name('search-pet');



Route::resource('document', 'DocumentController', ['name' => 'document']);
Route::resource('pet', 'PetController', ['name' => 'pet']);
Route::resource('search', 'SearchController', ['name' => 'search']);
