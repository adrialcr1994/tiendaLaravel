<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlador_carrito extends Controller
{
    //Constructor de session donde guardo el carrito
    
    public function __construct(){
        
        if(!\Session::has('carrito'))
        //Creamos el carrito a traves de Session y le ponemos un array donde almacenar los datos
        \Session::put('carrito', array());
    }

    public function mostrar_carrito(){

        $carrito= \Session::get('carrito');
        //Le añadimos el total a pagar
        $total= $this->total_pagar();
        $finalizar=true;
        //Comprobamos que hay suficiente stock en tienda para seguir comprando
        foreach($carrito as $item){
            if($item->stock < $item->cantidad){
                $finalizar=false;
            break;
            }
        }
        return view('carrito', compact('carrito', 'total', 'finalizar'));
        
    }

    //agregar item
    public function añadir_item($codigo_producto){

        $datos= \DB::table('producto')->where('codigo_producto', $codigo_producto)->first();

        $carrito= \Session::get('carrito');
        //Añadimos la cantidad de objetos y el objeto seleccionado
        $datos->cantidad=1;
        $carrito[$datos->codigo_producto]=$datos;
        //A traves del put insertamos los nuevos datos en el Session de carrito
        \Session::put('carrito', $carrito);

        return redirect()->route('mostrar_carrito');

    }

    //quitar item
    public function borrar_item($codigo_producto){

        $datos= \DB::table('producto')->where('codigo_producto', $codigo_producto)->first();

        $carrito= \Session::get('carrito');
        //Con el unset() destruimos el producto que hemos saleccionado
        unset($carrito[$datos->codigo_producto]);

        \Session::put('carrito', $carrito);

        return redirect()->route('mostrar_carrito');
    }

    //vaciar carrito

    public function vaciar_carrito(){
        //Cuando se utiliza forget() se elimina el Session de carrito y sus objetos
        \Session::forget('carrito');

        return redirect()->route('mostrar_carrito');
    }

    //actualizar carrito

    public function actualizar_item($codigo_producto, $cantidad){

        $datos= \DB::table('producto')->where('codigo_producto', $codigo_producto)->first();
       
        $carrito= \Session::get('carrito');
        //Para actualizar la cantidad cogemos el valor que viene de un formulario y lo actualizamos
        $carrito[$datos->codigo_producto]->cantidad = $cantidad;

        \Session::put('carrito', $carrito);

        return redirect()->route('mostrar_carrito');
    }
    //total a pagar

    public function total_pagar(){

        $datos= \DB::table('producto')->get();

        $carrito= \Session::get('carrito');
        $total=0;

        foreach($carrito as $item){
            //Para calcular el total cogemos del carrito el precio del producto y la cantidad
            $total += $item->precio_producto * $item->cantidad;
        }
        return $total;
    }

    //Verificar si se ha logueado o si esta el carrito vacio

    public function detalle_pedido(){
        //Comprueba si hay algo dentro del carrito
        if(count(\Session::get('carrito'))<=0) return redirect()->route('home');
        
        $carrito= \Session::get('carrito');
        $total= $this->total_pagar();
        
        return view('detalles_pedido', compact('carrito', 'total'));
        
    }
}
