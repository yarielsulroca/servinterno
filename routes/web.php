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
    return view('auth.login');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    // Las rutas que incluyas aquí pasarán por el middleware 'auth'
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('usuario','UsuarioController');
    /**
     * Rutas para deficiencias
     */
    Route::resource('deficiencia','DeficienciaController');
    /**
     * Rutas para medidas
     */
    Route::get('medida','MedidaController@index')->name('medida.index');
    Route::get('medida/{id}','MedidaController@create')->name('medida.create');
    Route::post('medida','MedidaController@store')->name('medida.store');
    Route::delete('medida/{medida}','MedidaController@destroy')->name('medida.destroy');
    /**
     * Ruta para el sistemas (Usuarios no admin y sus funcionabilidades)
     */
    Route::get('sistema','SistemaController@index')->name('sistema.index');
    Route::get('sistema/{id}/edit','SistemaController@edit')->name('sistema.edit');
    Route::put('sistema/{medida}','SistemaController@update')->name('sistema.update');
    /**
     * Reportes
     */
    Route::get('reporte','ReporteController@index')->name('reporte.index');
    Route::get('reporte/filtrar/','ReporteController@filtraControlador')->name('reporte.filtraUsuario');


})
?>