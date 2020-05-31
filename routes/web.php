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

Route::get('categorias/{id_categoria}', ['as'=>'categorias','uses'=>'controlador_tienda@listar_categorias']);

Route::get('monedas/{id_monedas}', ['as'=>'monedas','uses'=>'controlador_tienda@actualizar_moneda']);

Route::get('pedidos', ['as'=>'pedidos','uses'=>'controlador_pedidos@pedidos']);

Route::get('cancelar_pedido/{id_pedido}', ['as'=>'cancelar_pedido','uses'=>'controlador_pedidos@cancelar_pedido']);
//Carrito

Route::get('carrito/mostrar', ['as'=>'mostrar_carrito','uses'=>'controlador_carrito@mostrar_carrito']);

Route::get('carrito/añadir/{producto}', ['as'=>'añadir_item','uses'=>'controlador_carrito@añadir_item']);

Route::get('carrito/borrar/{producto}', ['as'=>'borrar_item','uses'=>'controlador_carrito@borrar_item']);

Route::get('carrito/vaciar', ['as'=>'vaciar_carrito','uses'=>'controlador_carrito@vaciar_carrito']);

Route::get('carrito/actualizar/{producto}/{cantidad?}', ['as'=>'actualizar_item','uses'=>'controlador_carrito@actualizar_item']);

//login

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/borrar', ['as' => 'borrar_usuario', 'uses' => 'controlador_borrar_usuario@borrar_usuario']);

Route::get('/formulario_actualizar_usuario', ['as' => 'formulario', 'uses' => 'controlador_pintar_formulario@pintar_formulario']);

Route::get('/actualizar', ['as' => 'actualizar_usuario', 'uses' => 'controlador_actualizar_usuario@actualizar_usuario']);

Route:: get('detalles-pedido',['middleware' => 'auth', 'as' => 'detalle-pedido', 'uses' => 'controlador_carrito@detalle_pedido']);

//PayPal
Route::get('payment', ['as' => 'payment', 'uses' => 'PaypalController@postPayment']);

Route::get('payment/status', ['as' => 'payment_status', 'uses' => 'PaypalController@getPaymentStatus']);

//PDF

Route::get('pdf/{id_pedido})', ['as'=>'pdf','uses'=>'controlador_pedidos@descargar_pdf']);

//Email

Route::get('correo/{id_pedido}', ['as'=>'correo','uses'=>'controlador_pedidos@email']);

//GeoIP

Route::get('geoip', ['as'=>'geoip','uses'=>'controlador_geoip@geoip']);

//Conversor_monedas

Route::get('conversor/{$id_moneda}', ['as'=>'conversor','uses'=>'controlador_conversor@conversor_moneda']);

