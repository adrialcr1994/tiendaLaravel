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


//Tienda

Route::get('/', ['as'=>'inicio','uses'=>'controlador_tienda@listar_destacados']);

Route::get('producto/{codigo_producto}', ['as'=>'detalles_producto','uses'=>'controlador_tienda@detalles_producto']);


//Carrito

Route::get('carrito/mostrar', ['as'=>'mostrar_carrito','uses'=>'controlador_carrito@mostrar_carrito']);

Route::get('carrito/añadir/{producto}', ['as'=>'añadir_item','uses'=>'controlador_carrito@añadir_item']);

Route::get('carrito/borrar/{producto}', ['as'=>'borrar_item','uses'=>'controlador_carrito@borrar_item']);

Route::get('carrito/vaciar', ['as'=>'vaciar_carrito','uses'=>'controlador_carrito@vaciar_carrito']);

Route::get('carrito/actualizar/{producto}/{cantidad?}', ['as'=>'actualizar_item','uses'=>'controlador_carrito@actualizar_item']);