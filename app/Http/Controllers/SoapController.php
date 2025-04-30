<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoapController extends Controller
{
    // Muestra el formulario al usuario
    public function formulario()
    {
        return view('backend.soap.formulario');
    }

    // Recibe los datos del formulario y llama al servicio SOAP
    public function calcular(Request $request)
    {
        // Validación de los campos del formulario
        $validated = $request->validate([
            'intA' => 'required|integer',
            'intB' => 'required|integer',
            'operacion' => 'required|in:Add,Multiply', // Solo se permiten esas dos operaciones
        ]);

        try {
            // Consumir el servicio SOAP
            $client = new \SoapClient('http://www.dneonline.com/calculator.asmx?WSDL');
            $params = ['intA' => $validated['intA'], 'intB' => $validated['intB']];
            $result = $client->__soapCall($validated['operacion'], [$params]);

            // Ej: si fue Add, accede a $result->AddResult
            $resultado = $result->{$validated['operacion'] . 'Result'};

            return back()->with('resultado', $resultado);
        } catch (\SoapFault $e) {
            return back()->withErrors(['soap' => $e->getMessage()]);
        }
    }
}
