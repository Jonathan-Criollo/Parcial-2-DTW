@extends('backend.menus.superior')
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Notas</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contactos as $contacto)
        <tr>
            <td>{{ $contacto->nombre }}</td>
            <td>{{ $contacto->apellidos }}</td>
            <td>{{ $contacto->telefono }}</td>
            <td>{{ $contacto->email }}</td>
            <td>{{ $contacto->notas }}</td>
            <td>
                <button class="btn btn-warning btn-sm" onclick="editarContacto({{ $contacto->id }})">Editar</button>
                <button class="btn btn-danger btn-sm" onclick="eliminarContacto({{ $contacto->id }})">Eliminar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
