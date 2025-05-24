<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Contactos</title>

    {{-- Bootstrap 5 y jQuery desde CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Toastr para mensajes (opcional) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   
</head>
<body class="bg-light">

<div class="container mt-5">

    <h3>Agenda de Contactos</h3>

    <button class="btn btn-primary mb-3" onclick="abrirModalCrear()">Nuevo contacto</button>

    <div id="contenedorTabla">
        {{-- Aquí se carga la tabla por AJAX --}}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalContacto" tabindex="-1" aria-labelledby="modalContactoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="formContacto">
                    @csrf
                    <input type="hidden" id="idContacto">
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombre">
                    </div>
                    <div class="mb-3">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" id="apellidos">
                    </div>
                    <div class="mb-3">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" id="telefono">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label>Notas</label>
                        <input type="text" class="form-control" id="notas">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="guardarContacto()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
function cargarTabla() {
    $('#contenedorTabla').load("{{ url('/admin/contactos/tabla') }}");
}

function abrirModalCrear() {
    $('#tituloModal').text('Nuevo contacto');
    $('#idContacto').val('');
    $('#formContacto')[0].reset();
    $('#modalContacto').modal('show');
}

/*
function guardarContacto() {
    let id = $('#idContacto').val();
    let url = id ? "/admin/contactos/actualizar/" + id : "/admin/contactos/guardar";
    let data = {
        _token: '{{ csrf_token() }}',
        nombre: $('#nombre').val(),
        apellidos: $('#apellidos').val(),
        telefono: $('#telefono').val(),
        email: $('#email').val(),
        notas: $('#notas').val()
    };

    $.post(url, data, function(res) {
        if (res.success == 1) {
            $('#modalContacto').modal('hide');
            toastr.success("Guardado con éxito");
            cargarTabla();
        }
    }).fail(function(err) {
        toastr.error("Error al guardar");
    });
}
*/

// Adaptar para validar antes de guardar
function guardarContacto() {
    var nombre = $('#nombre').val().trim();
    var apellidos = $('#apellidos').val().trim();
    var telefono = $('#telefono').val().trim();
    var email = $('#email').val().trim();
    var notas = $('#notas').val().trim();
    var id = $('#idContacto').val();

    // Validaciones
    if (nombre === '') {
        toastr.error('El nombre es requerido');
        return;
    }
    if (nombre.length > 50) {
        toastr.error('Máximo 50 caracteres para el nombre');
        return;
    }
    if (apellidos === '') {
        toastr.error('Los apellidos son requeridos');
        return;
    }
    if (apellidos.length > 50) {
        toastr.error('Máximo 50 caracteres para los apellidos');
        return;
    }
    if (telefono === '') {
        toastr.error('El teléfono es requerido');
        return;
    }
    if (!/^\d{8,15}$/.test(telefono)) {
        toastr.error('El teléfono debe contener solo números y tener entre 8 y 15 dígitos');
        return;
    }
    if (email === '') {
        toastr.error('El email es requerido');
        return;
    }
    // Validación básica de email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        toastr.error('El email no es válido');
        return;
    }
    if (notas === '') {
        toastr.error('La nota es requerido');
        return;
    }
    if (notas.length > 200) {
        toastr.error('Máximo 200 caracteres para notas');
        return;
    }

    var url = id ? "/admin/contactos/actualizar/" + id : "/admin/contactos/guardar";
    var data = {
        _token: '{{ csrf_token() }}',
        nombre: nombre,
        apellidos: apellidos,
        telefono: telefono,
        email: email,
        notas: notas
    };

    $.post(url, data, function(res) {
        if (res.success == 1) {
            $('#modalContacto').modal('hide');
            toastr.success("Contacto guardado con éxito");
            cargarTabla();
            
        } else {
            toastr.error("Error al guardar");
        }
    }).fail(function(err) {
        toastr.error("Error al guardar");
    });
}

function editarContacto(id) {
    $.get("/admin/contactos/editar/" + id, function(data) {
        $('#tituloModal').text('Editar contacto');
        $('#idContacto').val(data.id);
        $('#nombre').val(data.nombre);
        $('#apellidos').val(data.apellidos);
        $('#telefono').val(data.telefono);
        $('#email').val(data.email);
        $('#notas').val(data.notas);
        $('#modalContacto').modal('show');
    });
}

function eliminarContacto(id) {
    if (!confirm("¿Eliminar este contacto?")) return;

    $.ajax({
        url: "/admin/contactos/eliminar/" + id,
        type: 'DELETE',
        data: { _token: '{{ csrf_token() }}' },
        success: function(res) {
            if (res.success == 1) {
                toastr.info("Eliminado");
                cargarTabla();
            }
        }
    });
}

$(document).ready(function () {
    cargarTabla();
});
</script>



</body>
</html>
