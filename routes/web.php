<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\RespostaController;
use App\Http\Middlewares\AutenticacaoMiddleware;

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

Route::resource('/solicitacao', SolicitacaoController::class);
Route::get('/solicitacao/add/{id}', 'App\Http\Controllers\SolicitacaoController@add' )->name('solicitacao.add');
Route::resource('/resposta', RespostaController::class);
Route::post('/solicitacao/listar', 'App\Http\Controllers\SolicitacaoController@listar' )->name('solicitacao.listar');
Route::get('/solicitacao/listar', 'App\Http\Controllers\SolicitacaoController@listar' )->name('solicitacao.listar');