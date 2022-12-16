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
    //dd(app());
    //dump(auth()->user());
    return view('welcome');
})->name('index');

Route::get('/files/{type}', 'filesController@index')->name('files');

Route::name('user.')->group(function () {
    Route::post('/login', 'userController@login')->name('login');
    Route::get('/logout', 'userController@logout')->name('logout');
});

Route::name('cabinet.')->middleware(['myAuth'])->group(function(){
    Route::get('/cabinet', 'cabinetController@index')->name('index');
    Route::post('/cabinet', 'cabinetController@post')->name('save');
});

Route::name('schools.')->middleware(['myAuth'])->group(function(){
    Route::get('/schools', 'schoolsController@index')->name('index');
    Route::get('/school/{id}', 'schoolsController@show')->name('show');
    Route::post('/school/{id}', 'schoolsController@change')->name('change');
    Route::get('/delschool/{id}', 'schoolsController@delete')->name('delete');
});

Route::name('photo.')->middleware(['myAuth'])->group(function(){
    Route::get('/foto/{id}','photoController@index')->name('index');
    Route::post('/foto/{id}','photoController@save')->name('save');
});
