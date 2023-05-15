<?php

use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GraficoController;
use App\Http\Controllers\HomeController;
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

//Route::get('dashboard',[RelatorioController::class,'show']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::get('/home', 'App\Http\Controllers\HomeController@index2')->name('grafico');

Route::get('/criar', 'App\Http\Controllers\RelatorioController@index')->name('criar');

//buscar os dados no database e jogar na view do dashboard em forma de grafico e de tabela
Route::get('/dashboard', 'App\Http\Controllers\GraficoController@index')->name('dashboard');

// para a pagina /grafico ok
//Route::get('/grafico', 'App\Http\Controllers\GraficoController@index')->name('dados');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//Route::get('/dados', function() {
//        $dados = DB::table('relatorios')
 //           ->select(DB::raw('MONTH(data_do_ocorrido) as mes'), DB::raw('COUNT(*) as total'))
 //           ->groupBy('mes')
 //           ->get();
 //   return response()->json($dados);
//})->name('dados');



//mostra a view /dashboard
//Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

//Route::get('/grafico', [App\Http\Controllers\GraficoController::class, 'index'])->name('grafico.index');

//Route::get('/grafico', 'GraficoController@index2')->name('grafico.index');

//Route::get('/grafico', 'HomeController@index2')->name('grafico.index');

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});
