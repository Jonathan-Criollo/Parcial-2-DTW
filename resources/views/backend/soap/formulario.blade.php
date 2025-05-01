<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora SOAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card-calculadora {
            background-color: #5d6d7e;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .card-header {
            background-color: #006eff;
            color: white;
            text-align: center;
            font-size: 1.4rem;
            font-weight: bold;
            padding: 1rem;
        }

        .form-control, .form-select {
            border-radius: 10px;
            font-size: 1.1rem;
        }

        .btn-calcular, .btn-limpiar {
            border-radius: 10px;
            font-size: 1.1rem;
            padding: 0.75rem;
            color: while;
        }

        .screen-result {
            background-color: #d5dbdb;
            color: #1c2833;
            font-size: 1.5rem;
            padding: 15px;
            border-radius: 10px;
            text-align: right;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-calculadora">

                <div class="card-header">
                    Calculadora
                </div>

                <div class="card-body bg-white">

                    {{-- Pantalla de resultado --}}
                    <div class="screen-result" id="pantallaResultado">
                        {{ session('resultado') ?? '0' }}
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger text-white">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('soap.calcular') }}" method="POST" id="formCalculadora">
                        @csrf

                        <div class="mb-3">
                            <input type="number" name="intA" id="intA" class="form-control" placeholder="Ingrese un número" required>
                        </div>

                        <div class="mb-3">
                            <input type="number" name="intB" id="intB" class="form-control" placeholder="Ingrese un número" required>
                        </div>

                        <div class="mb-3">
                            <label for="operacion" class="form-label">Operación</label>
                            <select name="operacion" id="operacion" class="form-select" required>
                                <option value="Add">Sumar</option>
                                <option value="Multiply">Multiplicar</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-6">
                               <button type="submit" class="btn btn-calcular btn-primary w-100">Calcular</button>
                        </div>
                        <div class="col-6">
                                <button type="button" class="btn btn-limpiar btn-warning w-100" onclick="limpiarFormulario()">Limpiar</button>
                        </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function limpiarFormulario() {
        document.getElementById("formCalculadora").reset();
        document.getElementById("pantallaResultado").textContent = '0';
    }
</script>

</body>
</html>

