<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora SOAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Calculadora SOAP (Suma / Multiplicación)</h2>

    @if (session('resultado'))
        <div class="alert alert-success">
            <strong>Resultado:</strong> {{ session('resultado') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $e)
                <div>{{ $e }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('soap.calcular') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="intA" class="form-label">Número A</label>
            <input type="number" name="intA" id="intA" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="intB" class="form-label">Número B</label>
            <input type="number" name="intB" id="intB" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="operacion" class="form-label">Operación</label>
            <select name="operacion" id="operacion" class="form-control" required>
                <option value="Add">Sumar</option>
                <option value="Multiply">Multiplicar</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
</body>
</html>
