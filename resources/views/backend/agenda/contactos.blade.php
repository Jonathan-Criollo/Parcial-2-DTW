@php
use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Contactos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/modal_agenda.css') }}" rel="stylesheet">

    
</head>
<body class="bg-light">

<div id="divcontenedor" >
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-sm-12">
                <h1>Agenda de Contactos</h1>
            </div>
            <br>
            @if(Auth::user()->hasRole('admin'))
                <button type="button" class="btn btn-primary btn-rounded fw-bold"
                    style="background-color:rgb(40, 59, 167); border:none;" onclick="abrirModalCrear()">
                    <i class="fas fa-edit"></i> Nuevo Contacto
                </button>
            @endif
            </div>
            </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Lista</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="contenedorTabla"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalContacto" tabindex="-1" aria-labelledby="modalContactoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-address-book"></i>
                <h5 class="modal-title mb-0" id="tituloModal">Contacto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="formContacto">
                    @csrf
                    <input type="hidden" id="idContacto">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control shadow-sm" id="nombre" placeholder="Ej: Juan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" class="form-control shadow-sm" id="apellidos" placeholder="Ej: Pérez Gómez">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" class="form-control shadow-sm" id="telefono" placeholder="Ej: 70112233">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control shadow-sm" id="email" placeholder="Ej: correo@ejemplo.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notas</label>
                        <input type="text" class="form-control shadow-sm" id="notas" placeholder="Notas adicionales">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-guardar" onclick="guardarContacto()">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>  

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Contacto guardado con éxito",
            showConfirmButton: false,
            timer: 1500
        });
        cargarTabla();
    } else {
        Swal.fire({
            icon: "error",
            title: "Error al guardar",
            text: "No se pudo guardar el contacto.",
            timer: 2000,
            showConfirmButton: false,
            position: "top-end"
        });
    }
}).fail(function(err) {
    Swal.fire({
        icon: "error",
        title: "Error al guardar",
        text: "Ocurrió un error inesperado.",
        timer: 2000,
        showConfirmButton: false,
        position: "top-end"
    });
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
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/contactos/eliminar/" + id,
                type: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function(res) {
                    if (res.success == 1) {
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "El contacto ha sido eliminado.",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });
                        cargarTabla();
                    } else {
                        Swal.fire("Error", "No se pudo eliminar el contacto.", "error");
                    }
                },
                error: function() {
                    Swal.fire("Error", "No se pudo eliminar el contacto.", "error");
                }
            });
        }
    });
}

$(document).ready(function () {
    cargarTabla();
});
</script>



</body>
</html>