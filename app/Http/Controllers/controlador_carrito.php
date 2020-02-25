<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlador_carrito extends Controller
{
    //Constructor de session donde guardo el carrito
    
    public function __construct(){

        if(!\Session::has('carrito'))

        \Session::put('carrito', array());
    }
    //motrar carrito

    public function mostrar_carrito(){

        $carrito= \Session::get('carrito');
        $total= $this->total_pagar();
        $finalizar=true;

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
        $datos->cantidad=1;
        $carrito[$datos->codigo_producto]=$datos;

        \Session::put('carrito', $carrito);

        return redirect()->route('mostrar_carrito');

    }

    //quitar item
    public function borrar_item($codigo_producto){

        $datos= \DB::table('producto')->where('codigo_producto', $codigo_producto)->first();

        $carrito= \Session::get('carrito');
        unset($carrito[$datos->codigo_producto]);

        \Session::put('carrito', $carrito);

        return redirect()->route('mostrar_carrito');
    }

    //vaciar carrito

    public function vaciar_carrito(){

        \Session::forget('carrito');

        return redirect()->route('mostrar_carrito');
    }

    //actualizar carrito

    public function actualizar_item($codigo_producto, $cantidad){

        $datos= \DB::table('producto')->where('codigo_producto', $codigo_producto)->first();
       
        $carrito= \Session::get('carrito');
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
            $total += $item->precio_producto * $item->cantidad;
        }
        return $total;
    }

    //Verificar si se ha logueado o si esta el carrito vacio

    public function detalle_pedido(){

        if(count(\Session::get('carrito'))<=0) return redirect()->route('home');
        
        $carrito= \Session::get('carrito');
        $total= $this->total_pagar();
        
        return view('detalles_pedido', compact('carrito', 'total'));
        
    }
}
