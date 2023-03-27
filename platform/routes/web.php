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

    // rotas separadas alunos
    Route::get('alunos', 'App\Http\Controllers\AlunoController@index')->name('alunos.index');
    Route::get('alunos/create', 'App\Http\Controllers\AlunoController@create')->name('alunos.create');
    Route::post('alunos', 'App\Http\Controllers\AlunoController@store')->name('alunos.store');
    Route::get('alunos/{id}', 'App\Http\Controllers\AlunoController@show')->name('alunos.show');
    Route::get('alunos/{id}/edit', 'App\Http\Controllers\AlunoController@edit')->name('alunos.edit');
    Route::put('alunos/{id}', 'App\Http\Controllers\AlunoController@update')->name('alunos.update');
    Route::delete('alunos/{id}', 'App\Http\Controllers\AlunoController@destroy')->name('alunos.destroy');

    // rotas resource cursos
    Route::resource('cursos', 'App\Http\Controllers\CursoController');

    // rotas separadas matriculas
    Route::get('matriculas', 'App\Http\Controllers\MatriculaController@index')->name('matriculas.index');
    Route::get('matriculas/create', 'App\Http\Controllers\MatriculaController@create')->name('matriculas.create');
    Route::post('matriculas', 'App\Http\Controllers\MatriculaController@store')->name('matriculas.store');
    Route::get('matriculas/{id}', 'App\Http\Controllers\MatriculaController@show')->name('matriculas.show');
    Route::get('matriculas/{id}/edit', 'App\Http\Controllers\MatriculaController@edit')->name('matriculas.edit');
    Route::put('matriculas/{id}', 'App\Http\Controllers\MatriculaController@update')->name('matriculas.update');
    Route::delete('matriculas/{id}', 'App\Http\Controllers\MatriculaController@destroy')->name('matriculas.destroy');
});