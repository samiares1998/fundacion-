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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mascotas', 'GestionMascotas@mascotas')->name('mascotas');
Route::get('/inicio', function () {
    return view('admin/inicio');
});
Route::post('/addMascota', 'GestionMascotas@addMascota')->name('addMascota');
Route::post('/editMascota/{id}', 'GestionMascotas@editMascota')->name('editMascota');

Route::get('/adoptantes', 'GestionMascotas@adoptantes')->name('adoptantes');
Route::post('/addAdoptante', 'GestionMascotas@addAdoptante')->name('addAdoptante');
Route::post('/editAdoptante/{id}', 'GestionMascotas@editAdoptante')->name('editAdoptante');

Route::get('/padrinos', 'GestionMascotas@padrinos')->name('adoptantes');
Route::post('/addpadrinos', 'GestionMascotas@addpadrinos')->name('addpadrinos');


Route::get('/veterinarias', 'GestionMascotas@veterinarias')->name('veterinarias');
Route::post('/addveterinarias', 'GestionMascotas@addveterinarias')->name('addveterinarias');
Route::post('/editveterinarias/{id}', 'GestionMascotas@editveterinarias')->name('editveterinarias');


Route::get('/historial/{id}', 'GestionMascotas@historial')->name('historial');
Route::get('/nueva_historia/{id}', 'GestionMascotas@nueva_historia')->name('nueva_historia');
Route::post('/registrar/{id}', 'GestionMascotas@registrar')->name('registrar');
Route::post('/registrarVacunas/{id}', 'GestionMascotas@registrarVacunas')->name('registrarVacunas');
Route::get('/editar_historia/{id}', 'GestionMascotas@editar_historia')->name('editar_historia');
Route::get('/deleteMascotas/{id}', 'GestionMascotas@deleteMascotas')->name('deleteMascotas');
Route::get('/deletePersona/{id}', 'GestionMascotas@deletePersona')->name('deletePersona');
Route::get('/deleteVeterinaria/{id}', 'GestionMascotas@deleteVeterinaria')->name('deleteVeterinaria');


Route::get('/logout', function () {
    Auth::guard('')->logout();
    return view('index');
});