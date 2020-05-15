<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class controlador_pintar_formulario extends Controller
{
    public function pintar_formulario(){
        
        $usuario = User::find(Auth::id());

        return view("formulario_actualizar", ["usuario" => $usuario]);
    }
}
