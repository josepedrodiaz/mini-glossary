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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/translator/{mini_glossaries_id}', 'TranslationController@translator')->name('translator');

Route::resource('/mini-glossary', 'MiniGlossaryController');

Route::resource('/language', 'LanguageController');

Route::resource('/terms', 'TermController');

Route::resource('/translation', 'TranslationController')->except([
    'create'
]);
Route::get('/translation/create/{term_id}', 'TranslationController@create');

