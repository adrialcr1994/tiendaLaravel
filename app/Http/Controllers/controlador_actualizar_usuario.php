<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class controlador_actualizar_usuario extends Controller
{

    public function actualizar_usuario(Request $request){

        //Cogemos los datos que recibimos de un formulario con el request los validamos con validate()
        $validarDatos= $request->validate([
            'nick' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'nombre' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
        ]);
            //Con el update actualizamos los datos de la base de datos
        auth()->user()->update($validarDatos);

        return redirect()->route('inicio');
     }
}
