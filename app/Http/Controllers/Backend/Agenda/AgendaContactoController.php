<?php

namespace App\Http\Controllers\Backend\Agenda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgendaContacto;

class AgendaContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Vista principal con tabla y modal
    public function index()
    {
        return view('backend.agenda.contactos');
    }

    // Tabla dinámica para AJAX
    public function tablaContactos()
    {
        $contactos = AgendaContacto::all();
        return view('backend.agenda.tabla.tablacontactos', compact('contactos'));
    }

    // Guardar nuevo contacto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'apellidos' => 'required|max:50',
            'telefono' => 'required|digits:8',
            'email' => 'required|email|unique:AgendaContactos,email',
            'notas' => 'nullable|max:150',
        ]);

        AgendaContacto::create($request->all());

        return response()->json(['success' => 1]);
    }

    // Obtener contacto para editar
    public function edit($id)
    {
        $contacto = AgendaContacto::findOrFail($id);
        return response()->json($contacto);
    }

    // Actualizar contacto
    public function update(Request $request, $id)
    {
        $contacto = AgendaContacto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:50',
            'apellidos' => 'required|max:50',
            'telefono' => 'required|digits:8',
            'email' => 'required|email|unique:AgendaContactos,email,' . $id,
            'notas' => 'nullable|max:150',
        ]);

        $contacto->update($request->all());

        return response()->json(['success' => 1]);
    }

    // Eliminar contacto
    public function destroy($id)
    {
        AgendaContacto::findOrFail($id)->delete();
        return response()->json(['success' => 1]);
    }
}
