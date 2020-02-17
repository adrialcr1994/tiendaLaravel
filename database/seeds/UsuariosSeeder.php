<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario= array([
            'nick_usuario' => 'pepe94',
            'contrasena_usuario' => \Hash::make('1234'),
            'correo_usuario' => 'pepe94@gmail.com',
            'nombre_apellido_usuario' => 'pepe rodriguez',
            'dni_usuario' => '44244321A',
            'direccion_usuario' => 'Bollullos del Condado'
        ]);

        \DB::table('usuario')->insert($usuario);
    }
}
