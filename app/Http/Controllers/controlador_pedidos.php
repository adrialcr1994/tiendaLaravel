<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Mail;

class controlador_pedidos extends Controller
{
    public function pedidos(){

        //Para visualizar los pedidos correspondientes al usuario logueado cogemos su id
        $id_usuario= Auth::id();

        $resumen_pedido= DB::table('resumen_pedido')->where('id_usuario', $id_usuario)->get();

        return view("pedidos", ["resumen_pedido" => $resumen_pedido]);
    }

    public function descargar_pdf($id_pedido){

    //Para descargar pdf he utilizado el paquete DOMPDF

        $datos= \DB::table('resumen_pedido')->where('id_pedido', $id_pedido)->first();
        $pdf= \PDF::loadView('pdf', ['datos' => $datos]);

        $rutaGuardado = "..\archivos_pdf\\";

        $nombreArchivo = "pedido" . $id_pedido . ".pdf";

        $output = $pdf->output();
        //Tambien guardamos los pdf en un carpeta externa para poder enviarlos por correo como adjunto
        file_put_contents( $rutaGuardado . $nombreArchivo, $output);
    
        return $pdf->download('archivo.pdf');
    }

    public function cancelar_pedido($id_pedido){
        //Podemos cambiar el estado del pedido siempre que no este cancelado ya
        $datos= DB::table('resumen_pedido')->where('id_pedido', $id_pedido)->update(['estado_pedido'=> 'cancelado']);

        return redirect()->route('pedidos');
    }

    public function email($id_pedido){

        //Para enviar correos he utilizado la funcion MAIL de laravel
        $data = array(
            'name' => 'Gracias por su compra'
        );

        //Utilizamos el use para insertar la variabla $id_pedido
       Mail::send('email', $data, function($mensaje) use ($id_pedido){
                $mensaje->from('adrialcr1994@gmail.com', 'Gracias por su compra');
                $mensaje->to('adrialcr1994@gmail.com')
                        ->subject('Prueba Correo Laravel')
                        ->attach('..\archivos_pdf\pedido'. $id_pedido .'.pdf');
        });

    return redirect()->route('pedidos'); 
}
    
}
