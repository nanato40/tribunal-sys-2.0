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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/secoes', 'SecaoController@listarSec');
Route::get('/admin/totalSec', 'SecaoController@totalSec');
Route::get('/admin/totalCon', 'ContratoController@totalCon');
Route::get('/admin/totalUsu', 'SupervisorController@totalUsu');
Route::get('/admin/secoes/{id}', 'SecaoController@excluir');
Route::post('/admin/secoes/update/{id}', 'SecaoController@update');
Route::get('/admin/settings', 'UsuarioController@settings');
Route::get('/admin/contratos', 'ContratoController@contratos');
Route::post('/admin/contratos/update', 'ContratoController@update');
Route::post('/admin/contratos/search', 'ContratoController@search');
Route::post('/admin/salvarSecao', 'SecaoController@salvarSecao');
Route::post('/admin/salvarSupervisor', 'SupervisorController@salvarSupervisor');
Route::post('/admin/updateUser', 'UsuarioController@updateUser');
Route::post('/admin/contratos/contratosMobile', 'ContratoController@contratosMobile');
Route::get('/admin/supervisores', 'SupervisorController@supervisores');
Route::get('/admin/secaoMobile', 'SecaoController@secaoMobile');
Route::get('/admin/usuario/deletar/{id}', 'SupervisorController@deletar');
Route::post('/admin/contratos/deletar', 'ContratoController@excluir'); // Alterar para POST no Ajax das requisições
Route::post('/admin/usuario/logarMobile', 'UsuarioController@logarMobile');



