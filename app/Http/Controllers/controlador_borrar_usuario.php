<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class controlador_borrar_usuario extends Controller
{
    public function borrar_usuario(){

       User::find(Auth::id())->delete();
       Auth::logout();
        return redirect()->route('inicio');
    }
}
