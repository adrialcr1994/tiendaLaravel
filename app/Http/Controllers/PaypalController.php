<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidateRequests;
use Illuminate\Support\Facades\Auth;
use App\User;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
    private $api_context;

    public function __construct(){

        $paypal_conf= \Config::get('paypal');
        $this->_api_context= new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function postPayment(){

    //Crear el pedido

    $datos_pedido= \Session::get('carrito');

    //Cogemos los datos del usuario logueado que necesitemos
    $direccion_usuario= auth()->user()->direccion;

    $nombre_usuario=auth()->user()->nombre;

    $correo_usuario=auth()->user()->email;

    $dni_usuario=auth()->user()->dni;

    $id_usuario= auth()->user()->id_usuario;

    //Cogemos los datos del carrito que necesitemos
    foreach($datos_pedido as $dato){

    $codigo_producto= $dato->codigo_producto;

    }
    //En un array metemos todos los datos que hemos recogido
    $resumen_pedido= array(

        'fecha_realizacion_pedido' => now(),
        'estado_pedido' => 'tramite',
        'direccion_pedido'=> $direccion_usuario,
        'nombre_usuario' => $nombre_usuario,
        'correo_usuario' => $correo_usuario,
        'dni_usuario' => $dni_usuario,
        'id_usuario' => $id_usuario,
        'codigo_producto' => $codigo_producto
    );
    //Con el insert() introducimos el array en la base de datos
    \DB::table('resumen_pedido')->insert($resumen_pedido);

    //PAYPAL
    
        $payer = new Payer();
        $payer -> setPaymentMethod('paypal');

        $item = array();
        $subtotal= 0;
        $carrito= \Session::get('carrito');
        $moneda = 'EUR';
        
        foreach($carrito as $producto){
            $item = new Item();

            $item->setName($producto->nombre_producto)
                ->setCurrency($moneda)
                ->setDescription($producto->descripcion_producto)
                ->setQuantity($producto->cantidad)
                ->setPrice($producto->precio_producto);
            
                $items[]=$item;
                $subtotal += $producto->cantidad * $producto->precio_producto;
        }

        
        
        $item_list= new ItemList();
        $item_list-> setItems($items);

        $details =new Details();
        $details->setSubtotal($subtotal)
        ->setShipping(100);

        $total= $subtotal + 100;

        $amount =new Amount();
        $amount->setCurrency($moneda)
        ->setTotal($total)
        ->setDetails($details);

       $transaction =new Transaction();
        $transaction->setAmount($amount)
        ->setItemList($item_list)
        ->setDescription('Pedido de prueba en mi tienda Laravel');

        $redirect_urls =new RedirectUrls();
        $redirect_urls->setReturnUrl(\URL::route('payment_status'))
        ->setCancelUrl(\URL::route('payment_status'));

        $payment =new Payment();
        $payment->setIntent('Sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));

        try{
            
            $payment->create($this->_api_context);
        }catch(\PayPal\Exception\PPConnectionException $ex){

            if(\Config::get('app.debug')){
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data= json_decode($ex->getData(), true);
                exit;
            } else{
                die('Algo salio mal');
            }
        }

        foreach($payment->getLinks() as $link){

            if($link->getRel()== 'approval_url'){
                $redirect_url= $link->getHref();
            break;
            }
        }

        \Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)){
            return \Redirect::away($redirect_url);
        }
        return \Redirect::route('mostrar_carrito')
        ->with('Error Desconocido');

    }


    public function getPaymentStatus(){

        $payment_id= \Session::get('paypal_payment_id');

        \Session::forget('paypal_payment_id');

        $payerId= \Input::get('PlayerId');
        $token= \Input::get('token');

        if(empty($payerId) || empty($token)){
            return \Redirect::route('inicio')
            ->with('message', "Hubo un problema al pagar con PayPal");
        }

        $payment= Payment::get($payment_id, $this->_api_context);

        $execution= new PaymentExecution();
        $execution->setPlayerId(\Input::get('PlayerId'));

        $result= $payment->execute($execution, $this->_api_context);

        if($result->getState() == 'approved'){
            return \Redirect::route('inicio')
            ->with('message', "Compra realizada correctamente");
        }

        return  \Redirect::route('inicio')
        ->with('message', "Compra cancelada");

        
    }
}
