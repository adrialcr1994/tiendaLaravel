<?php

namespace App\Http\Middleware;

use GuzzleHttp\Client;
use Closure;
use Carbon\Carbon;

class Actualizar_moneda
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */

     // Cargar un archivo XML en php
    public function handle($request, Closure $next){

        $fecha= \DB::table('monedas')->first()->updated_at;

        //Coge la ultima fecha de actualizacion de la moneda comprueba si es del dia actual y si lo es no actualiza su valor
        if (!Carbon::createFromFormat('Y-m-d H:i:s', $fecha)->isToday()) {

        //Archivo XML
        $client = new Client();
        $response = $client->request('GET', 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
        $xml = $response->getBody()->getContents();
        
        //Buscar dentro del array de XML los atributos
        $currencies = xml_to_array($xml)['Cube']['Cube']['Cube'];
                $currencies = array_map(function ($currency) {
                    return $currency['@attributes'];
                }, $currencies);
                
    
                foreach ($currencies as $currency) {
                \DB::table('monedas')
                ->where('moneda', $currency['currency'])
                ->update(['valor' => $currency['rate'], 'updated_at' => Date("Y/m/d H:i:s")]);
    
                /*\DB::table('monedas')->insert([
                    ['moneda' =>$currency['currency'], 'valor' => $currency['rate']]
                ]);*/
                }

            }

                return $next($request);
            
        }
}
