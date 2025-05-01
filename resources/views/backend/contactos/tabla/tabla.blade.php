@extends('backend.menus.superior')

@section('content-admin-css')
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/buttons_estilo.css') }}" rel="stylesheet">
@stop

<style>
    table{
        /*Ajustar tablas*/
        table-layout:fixed;
    }
</style>

<!-- Muestra una lista de permisos de un determinado Rol, para acceder aqui hay que seleccionar
    un Rol primero-->


    
    <div class="col-sm-12">
                <h1>Agenda de Contactos</h1>
            </div>

            <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Lista</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="tablaDatatable">
                            <table id="tabla" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th style="width: 4%">Nombre</th>
                            <th style="width: 4%">Empresa</th>
                            <th style="width: 4%">Teléfono</th>
                            <th style="width: 4%">Email</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($contactos as $contacto)
                            <tr>
                                <td style="width: 4%">{{ $contacto['nombre'] ?? '' }}</td>
                                <td style="width: 4%">{{ $contacto['empresa'] ?? '' }}</td>
                                <td style="width: 4%">{{ $contacto['telefono'] ?? '' }}</td>
                                <td style="width: 4%">{{ $contacto['email'] ?? '' }}</td>
                            </tr>
                            @endforeach

                            </tbody>

                        </table>

                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






@extends('backend.menus.footerjs')
@section('archivos-js')

    <script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/axios.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/alertaPersonalizada.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>

    

   



@stop
