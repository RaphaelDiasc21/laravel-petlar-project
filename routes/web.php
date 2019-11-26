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

Route::get('/', 'MainController@index')->name('main');

/* Posts */
Route::get('/adocoes', 'AdocoesController@index')->name('posts.adocoes');
Route::get('/perdidos', 'PerdidosController@index')->name('posts.perdidos');
Route::get('/encontrados', 'EncontradosController@index')->name('posts.encontrados');
/* Posts usuario */
Route::get('/posts-usuario', 'UsuariosController@postsUsuario')->name('posts.usuario');
Route::delete('/posts-usuario/{id}', 'UsuariosController@deletePost')->name('posts.usuario.delete');
/* Filtragem de posts */
Route::post("/adocoes",'AdocoesController@filterPosts')->name('adocoes.filtro');
Route::post("/perdidos",'PerdidosController@filterPosts')->name('perdidos.filtro');
Route::post("/encontrados",'EncontradosController@filterPosts')->name('encontrados.filtro');


/* Registro de posts */
Route::get('/registrar-post', 'PostController@index')->name('post.index')->middleware('autenticacaoUsuario');
Route::post('/registrar-post', 'PostController@registroPost')->name('post.index')->middleware('autenticacaoUsuario');

/* Registro de usuario */
Route::post('/registrar-usuario','UsuariosController@registrar')->name('usuario.registrar.dados');
Route::get('/registrar-usuario', 'UsuariosController@registrarUsuario')->name('usuarios.registrar');




/* Autenticação de usuario */
Route::get("/logar","UsuariosController@login")->name('usuario.logar');
Route::post("/logar","UsuariosController@loginUsuario");

Route::get("/deslogar","UsuariosController@deslogar")->name('usuario.deslogar');
