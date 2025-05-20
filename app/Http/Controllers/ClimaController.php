<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClimaController extends Controller
{
    // Muestra el formulario o la vista principal para consultar clima
    public function formulario()
    {
        return view('backend.consumirapi.clima');
    }

    // Procesa la consulta del clima
    public function consultar(Request $request)
    {
        $ciudad = $request->input('ciudad');
        $apiKey = '86ba7143c9ccb3829929482842734ddd';

        $url = "https://api.openweathermap.org/data/2.5/weather?q={$ciudad}&appid={$apiKey}&units=metric&lang=es";

        $response = Http::get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Ciudad no encontrada'], 404);
        }
    }
}