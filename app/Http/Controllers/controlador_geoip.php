<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlador_geoip extends Controller
{
    public function geoip(){
    $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);

    dd($arr_ip);
    
    }
}
