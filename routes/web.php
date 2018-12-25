
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



Route::get('test/question1','TestController@question1');
Route::post('test/question1','TestController@findNextAlphabet');

Route::get('test/question2','TestController@question2');


Route::get('test/question3','TestController@question3');
Route::post('test/question3','TestController@getThenValue');







Route::resource('test', 'TestController');