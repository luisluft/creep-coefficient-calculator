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

Route::get('/calculo', 'ControllerFluencia@formulario')->name('creep.calculus');

Route::get('/', 'ControllerFluencia@formulario');

Route::get('/teoria', 'ControllerFluencia@teoria')->name('creep.theory');

Route::get('/exemplo', 'ControllerFluencia@exemplo')->name('creep.example');

Route::get('/sobre', 'ControllerFluencia@sobre')->name('creep.about');

Route::post('/calculo', 'ControllerFluencia@calculo');


