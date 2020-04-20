<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Support\Facades\DB;

class controlador_tienda extends Controller
{
    public function listar_destacados()
    {

        $productos = DB::table('producto')->where('destacado_producto', 1)->get();
        $categorias = DB::table('categoria')->get();

       return view("listar_productos", ["productos" => $productos, "categorias"=>$categorias]);
    }

    public function detalles_producto($codigo_producto){

        $datos= DB::table('producto')
            ->where('codigo_producto', $codigo_producto)->first();
        return view("especificaciones", ["datos" => $datos]);
    }

    public function listar_categorias($id_categoria){
        $productos= DB::table('producto')
            ->where('id_categoria', $id_categoria)->get();
        
            return view("productos_por_categoria", ["productos" => $productos]);
    }

    public function actualizar_moneda($id_moneda){

        $valor_moneda= DB::table('monedas')
            ->where('moneda', $id_moneda)->get();
        
        $valor_predefinido = DB::table('producto')->select('precio_producto')->get();
        
        foreach($valor_moneda as $valor){
            
            $productos = $valor['valor'];
        }

        dd($productos);
    }
}
