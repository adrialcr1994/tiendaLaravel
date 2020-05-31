<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class controlador_borrar_usuario extends Controller
{
    public function borrar_usuario(){
        //Cogemos el id de usuario que esta logueado y con el delete() lo borramos
       User::find(Auth::id())->delete();
       //Cerramos la sesion
       Auth::logout();
        return redirect()->route('inicio');
    }
}
