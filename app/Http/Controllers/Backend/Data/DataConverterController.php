<?php

namespace App\Http\Controllers\Backend\Data;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DataConverterController extends Controller
{
    public function xmlToJson()
    {
        $rutaRelativa = 'xml/Agenda.xml'; // Archivo XML en minúsculas
        $rutaAbsoluta = storage_path('/' . $rutaRelativa);

        // Verificar si el archivo existe
        if (!file_exists($rutaAbsoluta)) {
            return response()->json([
                'error' => 'Archivo no encontrado',
                'ruta_absoluta' => $rutaAbsoluta,
                'archivos_en_xml' => scandir(storage_path('/axml/genda.xml'))
            ], 404);
        }

        // Leer y convertir el XML a JSON
        $xml = simplexml_load_file($rutaAbsoluta);
        $json = json_encode($xml, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        // Pasar los datos a la vista
        return view('backend.data.converter', [
            'jsonData' => $json,
            'contactos' => json_decode($json, true)['contacto'] ?? [],
            'titulo' => 'Agenda de Contactos'
        ]);
    }
}
