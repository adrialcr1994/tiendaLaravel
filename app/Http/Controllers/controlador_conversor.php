<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlador_conversor extends Controller
{
    public function conversor_moneda($id_moneda){

    $moneda= \DB::table('monedas')->where('moneda', $id_moneda)->first();

    dd($moneda);
    }
}
