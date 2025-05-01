<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\P_Departamento;
use App\Models\P_UsuarioDepartamento;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    public function mostrarDesdeXML()
    {
        $xmlPath = storage_path('xml/contactos.xml');

        if (!file_exists($xmlPath)) {
            return response()->json(['error' => 'Archivo XML no encontrado'], 404);
        }

        $xml = simplexml_load_file($xmlPath);
        $json = json_encode($xml);
        $array = json_decode($json, true);

        // Verifica que la clave 'contacto' exista
        $contactos = $array['contacto'] ?? [];

        $user = Auth::user();

        // ADMINISTRADOR SISTEMA
        $ruta = 'contactos.tabla';
        

        $titulo = "Contactos XML";

        return view('backend.contactos.listado2', compact('contactos', 'titulo', 'ruta', 'user'));
    }

    // retorna datos de tabla para roles
    public function mostrarTablaXML(){
   
        $xmlPath = storage_path('xml/contactos.xml');

        if (!file_exists($xmlPath)) {
            return response()->json(['error' => 'Archivo XML no encontrado'], 404);
        }

        $xml = simplexml_load_file($xmlPath);
        $json = json_encode($xml);
        $array = json_decode($json, true);

        // Verifica que la clave 'contacto' exista
        $contactos = $array['contacto'] ?? [];

        return view('backend.contactos.tabla.tabla', compact('contactos'));
    }
}
