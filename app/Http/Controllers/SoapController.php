<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoapController extends Controller
{
    public function sumar()
    {
        try {
            $client = new \SoapClient('http://www.dneonline.com/calculator.asmx?WSDL');
            $params = ['intA' => 5, 'intB' => 3];
            $result = $client->__soapCall('Add', [$params]);
            return response()->json(['result' => $result->AddResult]);
        } catch (\SoapFault $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}