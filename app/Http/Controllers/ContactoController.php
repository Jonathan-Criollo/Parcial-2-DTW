<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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

        return view('backend.contactos.listado', compact('contactos'));
    }
}
