<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class controlador_actualizar_usuario extends Controller
{

    public function actualizar_usuario(Request $request){

        $validarDatos= $request->validate([
            'nick' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'nombre' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
        ]);

        auth()->user()->update($validarDatos);

        return redirect()->route('inicio');
     }
}
