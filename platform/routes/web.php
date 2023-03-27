<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('alunos', 'App\Http\Controllers\AlunoController@index')->name('alunos.index');
    Route::get('alunos/create', 'App\Http\Controllers\AlunoController@create')->name('alunos.create');
    Route::post('alunos', 'App\Http\Controllers\AlunoController@store')->name('alunos.store');
    Route::get('alunos/{id}', 'App\Http\Controllers\AlunoController@show')->name('alunos.show');
    Route::get('alunos/{id}/edit', 'App\Http\Controllers\AlunoController@edit')->name('alunos.edit');
    Route::put('alunos/{id}', 'App\Http\Controllers\AlunoController@update')->name('alunos.update');
    Route::delete('alunos/{id}', 'App\Http\Controllers\AlunoController@destroy')->name('alunos.destroy');
});