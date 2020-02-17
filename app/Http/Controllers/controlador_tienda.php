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
}
