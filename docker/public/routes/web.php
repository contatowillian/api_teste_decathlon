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


/* Chama a home do sistema caso entre na raiz da pasta */
Route::get('/', 'HomeController@index');

Auth::routes();

/* Chama a api de bikes do sistema*/
Route::get('/sistema/city_bikes', 'ApiBikeCityController@index')->name('Api Bike Citys');

/* Chama a home do sistema*/
Route::get('/sistema', 'ApiBikeCityController@Graficos_City_Bike')->name('Api Bike Citys');

/* Chama a home do sistema*/
Route::get('/sistema/graficos_city_bike', 'ApiBikeCityController@Graficos_City_Bike')->name('Api Bike Citys');


/* Chama o controller da  APi do CITYBIKES*/
Route::any('/sistema/Gera_json_api_CityBike', 'ApiBikeCityController@Gera_json_api_CityBike')->name('API City Bikes');


/* Chama a alteração dos Produtos*/
Route::get('/sistema/alterar_produtos', 'ProdutosController@alterar_produtos')->name('Alterar Produtos');

/* Chama a pesquisa de  produtos*/
Route::get('/sistema/pesquisar_produtos', 'ProdutosController@pesquisa_produtos')->name('Pesquisa de Produtos');

/* Chama  a pagina que envia  a Planilha de produtos*/
Route::get('/upload_planilha', 'ProdutosController@upload_planilha')->name('Upload da planilha de Produtos');

/* Chama  o upload da Planilha*/
Route::post('/recebe_arquivo_produtos', 'ProdutosController@recebe_arquivo_produtos')->name('Upload da planilha de Produtos');

/* Chama  a pagina que envia  a Planilha de produtos*/
Route::get('/fila_produtos', 'ProdutosController@lista_processamento_produtos')->name('Lista processamento de Produtos');

/* Chama  a pagina que envia  a Planilha de produtos*/
Route::get('/gera_lista_fila_produtos', 'ProdutosController@gera_listas_fila_produtos')->name('Gera via ajax a lista de processamento de Produtos');

/* Rota dos jogos*/
Route::get('/sistema/jogo', 'JogoController@jogo_velha')->name('Jogo da Velha');

/* Rota do historico dos jogos*/
Route::post('/historico_jogo_velha', 'JogoController@historico_jogo_velha')->name('Historico Jogo da Velha');

/* Rota do historico dos jogos*/
Route::get('/pesquisa_historico_jogo', 'JogoController@pesquisa_historico_jogo')->name('Ver Historico Jogo da Velha');

/* Rota do historico dos jogos*/
Route::get('/request_lista_jogo', 'JogoController@request_lista_jogo')->name('Request listsa jogo');

/* Rota da galeria de fotos*/
Route::get('/album', 'HomeController@AlbumFamilia')->name('Album de familia');

/* Rota da galeria de fotos*/
Route::get('/galeria', 'HomeController@galeria')->name('Album de familia');

/* Rota da galeria de videos*/
Route::get('/galeria_videos', 'HomeController@GaleriaVideos')->name('Album de familia');

//abaixo são as chamadas da API
Route::get('/api/v1/produtos/{id?}', 'ProdutosController@index');
Route::post('/api/v1/produtos', 'ProdutosController@store');
Route::post('/api/v1/produtos/{id}', 'ProdutosController@update');
Route::delete('/api/v1/produtos/{id}', 'ProdutosController@destroy');
