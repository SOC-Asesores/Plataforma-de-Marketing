<?php

use Illuminate\Support\Facades\Route;

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
//Route Autologin
Route::get('/appredirect/{key}','App\Http\Controllers\RegistrosController@autologin');

//Routes Registro
Route::get('/home-user','App\Http\Controllers\RegistrosController@index');
Route::get('/home-user-2','App\Http\Controllers\foldersController@index_2');
Route::get('/','App\Http\Controllers\foldersController@index');
Route::get('/lineas/{linea}','App\Http\Controllers\RegistrosController@linea');
Route::get('/search/{search}','App\Http\Controllers\RegistrosController@search');
Route::post('/registro','App\Http\Controllers\RegistrosController@registro')->name('registro');
Route::get('/carpeta/{id}','App\Http\Controllers\RegistrosController@archivo');
Route::post('/delete','App\Http\Controllers\RegistrosController@delete')->name('delete');

//Routes Archivos
Route::get('/dashboard', 'App\Http\Controllers\ArchivosController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/folders-data', 'App\Http\Controllers\ArchivosController@dashboard2')->name('dashboard2')->middleware('auth');
Route::get('/buttons-data', 'App\Http\Controllers\ArchivosController@dashboard3')->name('dashboard3')->middleware('auth');
Route::post('/export', 'App\Http\Controllers\ArchivosController@export')->name('export')->middleware('auth');
Route::post('/exportFolders', 'App\Http\Controllers\ArchivosController@export2')->name('export2')->middleware('auth');
Route::get('/registro/{url}','App\Http\Controllers\ArchivosController@index');
Route::get('/archivos/{url}','App\Http\Controllers\ArchivosController@archivos');
Route::post('/archivo','App\Http\Controllers\ArchivosController@archivo');
Route::post('/delete_file','App\Http\Controllers\ArchivosController@delete')->name('delete_file');
Route::post('/delete_file_multiple','App\Http\Controllers\ArchivosController@delete_multiple')->name('delete_file_multiple');
Route::post('/archivo-update','App\Http\Controllers\ArchivosController@saveName')->name('saveName');
Route::post('/updateCount','App\Http\Controllers\ArchivosController@updateCount')->name('updateCount');
Route::post('/updateCountButton','App\Http\Controllers\ArchivosController@updateCountButton')->name('updateCountButton');
Route::post('/searchFiles','App\Http\Controllers\ArchivosController@searchFiles')->name('searchFiles')->middleware('auth');
Route::post('/searchFolders','App\Http\Controllers\ArchivosController@searchFolders')->name('searchFolders')->middleware('auth');


//Routes Folders
Route::post('/checkFolder','App\Http\Controllers\foldersController@checkFolder')->name('checkFolder');
Route::post('/insertFolder','App\Http\Controllers\foldersController@insertFolder')->name('insertFolder');
Route::post('/folder-update','App\Http\Controllers\foldersController@saveName')->name('saveNameFolder');
Route::post('/delete-folder','App\Http\Controllers\foldersController@deleteFolder')->name('deleteFolder');


//Routes New
Route::get('/categoria/{categoria}','App\Http\Controllers\ArchivosController@categoria');;
Route::post('/insert','App\Http\Controllers\ArchivosController@insertRegistro')->name('insert');

//Routes Identidad
Route::post('/identidad_presentacion/send_identidad','App\Http\Controllers\IdentidadController@sendIdentidadPresentacion')->name('sendIdentidadPresentacion');
Route::post('/identidad_firma/send_identidad','App\Http\Controllers\IdentidadController@sendIdentidadFirma')->name('sendIdentidadFirma');
Route::post('/identidad_firma/send_posters','App\Http\Controllers\IdentidadController@sendIdentidadPosters')->name('sendIdentidadPosters');
Route::post('/identidad_digital/send_identidad','App\Http\Controllers\IdentidadController@sendIdentidadTarjeta')->name('sendIdentidadTarjeta');
Route::get('/tarjeta_digital/{id}','App\Http\Controllers\IdentidadController@tarjetaDigital')->name('tarjetaDigital');
Route::post('/imprimir/sendMail','App\Http\Controllers\IdentidadController@sendMail')->name('sendMail');
//Routes Templates
Route::get('/linea/hipotecario', function () {
    return view('l_hipotecario');
});
Route::get('/linea/empresarial', function () {
    return view('l_empresarial');
});
Route::get('/linea/seguros', function () {
    return view('l_seguros');
});

Route::get('/difusion/hipotecario', function () {
    return view('c_hipotecario');
});
Route::get('/difusion/empresarial', function () {
    return view('c_empresarial');
});
Route::get('/difusion/seguros', function () {
    return view('c_seguros');
});

Route::get('/identidad', function () {
    return view('identidad');
});

Route::get('/identidad_presentacion', function () {
    return view('identidad_presentacion');
})->name("idenditadPresentacion");

Route::get('/identidad_digital', function () {
    return view('identidad_digital');
});

Route::get('/imprimir', function () {
    return view('imprimir');
});

Route::get('/identidad_posters', function () {
    return view('identidad_posters');
});

Route::get('/identidad_firma', function () {
    return view('identidad_firma');
});

Route::get('/herramientas', function () {
    return view('herramientas');
});

Route::get('/eventos', function () {
    return view('eventos');
});

Route::get('/fotos', function () {
    return view('fotos');
});

Route::get('/videos', function () {
    return view('videos');
});

Route::get('/aula', function () {
    return view('aula');
});

Route::get('/proximos_eventos', function () {
    return view('proximos_eventos');
});

Route::get('/gaceta', function () {
    return view('gaceta');
});

Route::get('/papeleria', function () {
    return view('papeleria');
});

Route::get('/l_hipotecario_redes_sociales', function () {
    return view('l_hipotecario_redes_sociales');
});

Route::get('/l_hipotecario_kit_bienvenida', function () {
    return view('l_hipotecario_kit_bienvenida');
});

Route::get('/l_empresarial_redes_sociales', function () {
    return view('l_empresarial_redes_sociales');
});

Route::get('/l_seguros_redes_sociales', function () {
    return view('l_seguros_redes_sociales');
});

Route::get('/l_seguros_redes_sociales', function () {
    return view('l_seguros_redes_sociales');
});

Route::get('/l_hipotecario_camapana_publicidad', function () {
    return view('l_hipotecario_camapana_publicidad');
});

Route::get('/l_eventos_fotos_workshop', function () {
    return view('l_eventos_fotos_workshop');
});

Route::get('/l_empresarial_kit_bienvenida', function () {
    return view('l_empresarial_kit_bienvenida');
});

Route::get('/l_seguros_kit_bienvenida', function () {
    return view('l_seguros_kit_bienvenida');
});

Route::get('/identidad_soc', function () {
    return view('identidad_soc');
});

Route::get('/logo', function () {
    return view('logo');
});

Route::get('/l_hipotecario_materiales_publicitarios_comunicacion', function () {
    return view('l_hipotecario_materiales_publicitarios_comunicacion');
});

Route::get('/l_empresarial_materiales_publicitarios_comunicacion', function () {
    return view('l_empresarial_materiales_publicitarios_comunicacion');
});

Route::get('/l_seguros_materiales_publicitarios_comunicacion', function () {
    return view('l_seguros_materiales_publicitarios_comunicacion');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\foldersController@index')->name('home');



