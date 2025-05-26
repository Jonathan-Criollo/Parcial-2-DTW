<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tablaContactos" class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
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
                                        <td>{{ $contacto->id }}</td>
                                        <td>{{ $contacto->nombre }}</td>
                                        <td>{{ $contacto->apellidos }}</td>
                                        <td>{{ $contacto->telefono }}</td>
                                        <td>{{ $contacto->email }}</td>
                                        <td>{{ $contacto->notas }}</td>
                                        <td>
                                            @if (Auth::user()->hasRole('admin'))
                                                <button class="btn btn-warning btn-sm"
                                                    onclick="editarContacto({{ $contacto->id }})">
                                                    <i class="fas fa-pencil-alt" title="Editar"></i>&nbsp; Editar
                                                </button>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="eliminarContacto({{ $contacto->id }})">
                                                    <i class="fas fa-trash-alt"></i> Eliminar
                                                </button>
                                            @else
                                                <span class="text-muted">Sin permiso</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(function () {
        $("#tablaContactos").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "pagingType": "full_numbers",
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "Todo"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
        });
    });
</script>