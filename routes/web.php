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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');

/* Rotas de Programas */
Route::get('/programas', 'ProgramaController@index')->name('programas');
Route::get('/programas/create', 'ProgramaController@create');
Route::get('/programas/detalhe/{id}', 'ProgramaController@show');
Route::get('/programas/editar/{id}', 'ProgramaController@edit');
Route::post('/programas/store', 'ProgramaController@store')->name('salvarPrograma');
Route::put('/programas/update/{id}', 'ProgramaController@update')->name('editarPrograma');
Route::delete('/programas/delete/{id}', 'ProgramaController@destroy')->name('deletarPrograma');

/* Rotas de Usuários */
Route::resource('usuarios', 'UsuarioController');

/* Rotas de Endereço */
Route::get('/usuarios/endereco/{id}', 'EnderecoController@formulario')->name('endereco.formulario');
Route::post('/usuarios/form/endereco', 'EnderecoController@store')->name('endereco.store');
Route::get('/usuarios/endereco/detalhes/{id}', 'EnderecoController@index')->name('endereco.index');
Route::get('/usuarios/endereco/detalhes/alterar/{id}', 'EnderecoController@edit')->name('endereco.edit');
Route::any('/usuarios/endereco/detalhes/atualizar/{endereco}', 'EnderecoController@update')->name('endereco.update');
Route::any('/usuarios/endereco/detalhes/remover/{id}', 'EnderecoController@destroy')->name('endereco.destroy');

/* Rotas de Familia */
Route::get('/usuarios/familia/{id}', 'FamiliaController@formulario')->name('familia.formulario');
Route::any('/usuarios/form/familia', 'FamiliaController@store')->name('familia.store');
Route::get('/usuarios/familia/detalhes/{id}', 'FamiliaController@index')->name('familia.index');
Route::any('/usuarios/familia/detalhes/remover/{id}', 'FamiliaController@destroy')->name('familia.destroy');

/* Rotas de Projetos */
Route::resource('projetos', 'ProjetoController');

/* Rotas de OficinasProjetos */
Route::resource('oficinas-projetos', 'OficinaProjetoController');

/* Rotas de TurmaOficinaProjeto */
// Route::resource('turma-oficina-projeto', 'TurmaOficinaProjetoController');
Route::get('oficinas-projetos/{idOficina}/turmas/create', 'TurmaOficinaProjetoController@create');
Route::post('oficinas-projetos/{idOficina}/turmas/', 'TurmaOficinaProjetoController@store');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}', 'TurmaOficinaProjetoController@show');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/edit', 'TurmaOficinaProjetoController@edit');
Route::put('oficinas-projetos/{idOficina}/turmas/{idTurma}/', 'TurmaOficinaProjetoController@update');
Route::delete('oficinas-projetos/{idOficina}/turmas/{idTurma}/', 'TurmaOficinaProjetoController@destroy');

/* Rotas PresencaOficinaProjeto */
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencas/', 'PresencaOficinaProjetoController@index');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencas/create', 'PresencaOficinaProjetoController@create');
Route::post('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencas/', 'PresencaOficinaProjetoController@store');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencas/{data}', 'PresencaOficinaProjetoController@show');
Route::put('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencas/{idPresenca}/justificar', 'PresencaOficinaProjetoController@justificar');

/* Rotas MatriculaOficinaProjeto */
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/', 'MatriculaOficinaProjetoController@index');
Route::get('oficinas-projetos/{idOficina}/matriculas/create', 'MatriculaOficinaProjetoController@create');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}', 'MatriculaOficinaProjetoController@show');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}/edit', 'MatriculaOficinaProjetoController@edit');
Route::post('oficinas-projetos/{idOficina}/matriculas/', 'MatriculaOficinaProjetoController@store');
Route::post('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}/concluir', 'MatriculaOficinaProjetoController@concluir');
Route::post('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}/desistir', 'MatriculaOficinaProjetoController@desistir');
Route::put('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}', 'MatriculaOficinaProjetoController@update');
Route::delete('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}', 'MatriculaOficinaProjetoController@destroy');