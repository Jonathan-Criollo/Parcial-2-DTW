<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoapController extends Controller
{
    public function multiplicar()
    {
        = new \SoapCliente('https://www.dneonline.com/calculator.asmx?WSDL');
        //Aqui modificar para que el usuario pueda ingresar datos en una vista
        = ['intA' => 10, 'intB' => 5];
        = $cliente ->__soapCall('add', [$params]);

        esponse()->json(['resultado' => $result->AddResult]);
    }
}
