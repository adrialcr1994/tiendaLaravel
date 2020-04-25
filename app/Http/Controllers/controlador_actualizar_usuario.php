<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class controlador_actualizar_usuario extends Controller
{
    public function actualizar_usuario(){

        $dato = Auth::user()->id;
        $dato=User::find(Auth::id())->get();
        dd($dato);
     }
}
