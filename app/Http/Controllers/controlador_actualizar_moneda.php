<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class controlador_actualizar_moneda extends Controller
{
    function actualizar_moneda(){
    $client = new Client();
    $response = $client->request('GET', 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
    $xml = $response->getBody()->getContents();

    $currencies = xml_to_array($xml)['Cube']['Cube']['Cube'];
            $currencies = array_map(function ($currency) {
                return $currency['@attributes'];
            }, $currencies);
            

            foreach ($currencies as $currency) {
            \DB::table('monedas')
            ->where('moneda', $currency['currency'])
            ->update(['valor' => $currency['rate']]);

            /*\DB::table('monedas')->insert([
                ['moneda' =>$currency['currency'], 'valor' => $currency['rate']]
            ]);*/
            }
    }

    
}
