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
    return view('login');
});

Route::get('index','indexcontroller@index')->name('index');
Route::get('comentarios','indexcontroller@comentarios')->name('comentarios');

Route::get('/login','accesocontroller@login')->name('login');
Route::POST('/valida','accesocontroller@valida')->name('valida');
Route::get('/cerrarsesion','accesocontroller@cerrarsesion')->name('cerrarsesion');


Route::get('/usuarios','usuariocontroller@usuarios')->name('usuarios');
Route::POST('/guardausuario','usuariocontroller@guardausuario')->name('guardausuario');
Route::get('/reporteusuarios','usuariocontroller@reporteusuarios')->name('reporteusuarios');
Route::get('/modificaus/{idus}','usuariocontroller@modificaus')->name('modificaus');
Route::POST('/editausuario','usuariocontroller@editausuario')->name('editausuario');
Route::get('/eliminau/{idus}','usuariocontroller@eliminau')->name('eliminau');
Route::get('/restaurau/{idus}','usuariocontroller@restaurau')->name('restaurau');


Route::get('/libros','libroscontroller@libros')->name('libros');
Route::POST('/guardalibro','libroscontroller@guardalibro')->name('guardalibro');
Route::get('/reportelibros','libroscontroller@reportelibros')->name('reportelibros');
Route::get('/modificali/{idli}','libroscontroller@modificali')->name('modificali');
Route::POST('/editalibros','libroscontroller@editalibros')->name('editalibros');
Route::get('/eliminali/{idli}','libroscontroller@eliminali')->name('eliminali');
Route::get('/restaurali/{idli}','libroscontroller@restaurali')->name('restaurali');


Route::get('/clasificaciones','clasificacioncontroller@clasificaciones')->name('clasificaciones');
Route::POST('/guardaclasificaciones','clasificacioncontroller@guardaclasificaciones')->name('guardaclasificaciones');
Route::get('/reporteclasificaciones','clasificacioncontroller@reporteclasificaciones')->name('reporteclasificaciones');
Route::get('/modificaclas/{idclas}','clasificacioncontroller@modificaclas')->name('modificaclas');
Route::POST('/editaclasifica','clasificacioncontroller@editaclasifica')->name('editaclasifica');
Route::get('/eliminaclas/{idclas}','clasificacioncontroller@eliminaclas')->name('eliminaclas');
Route::get('/restauraclas/{idclas}','clasificacioncontroller@restauraclas')->name('restauraclas');


Route::get('/generos','generocontroller@generos')->name('generos');
Route::POST('/guardageneros','generocontroller@guardageneros')->name('guardageneros');
Route::get('/reportegeneros','generocontroller@reportegeneros')->name('reportegeneros');
Route::get('/modificagen/{idgen}','generocontroller@modificagen')->name('modificagen');
Route::POST('/editageneros','generocontroller@editageneros')->name('editageneros');
Route::get('/eliminagen/{idgen}','generocontroller@eliminagen')->name('eliminagen');
Route::get('/restauragen/{idgen}','generocontroller@restauragen')->name('restauragen');


Route::get('/sucursales','sucursalcontroller@sucursales')->name('sucursales');
Route::POST('/guardasucursales','sucursalcontroller@guardasucursales')->name('guardasucursales');
Route::get('/reportesucursal','sucursalcontroller@reportesucursal')->name('reportesucursal');
Route::get('/modificasu/{idsu}','sucursalcontroller@modificasu')->name('modificasu');
Route::POST('/editasucursal','sucursalcontroller@editasucursal')->name('editasucursal');
Route::get('/eliminasu/{idsu}','sucursalcontroller@eliminasu')->name('eliminasu');
Route::get('/restaurasu/{idsu}','sucursalcontroller@restaurasu')->name('restaurasu');





Route::name('enviar')->get('enviar','EmailController@enviar');






