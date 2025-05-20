<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta del Clima</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Consulta del Clima</h1>

    <form id="form-clima">
        <input type="text" name="ciudad" id="ciudad" placeholder="Ingresa una ciudad" required>
        <button type="submit">Consultar Clima</button>
    </form>

    <pre id="resultado"></pre>

    <script>
        document.getElementById('form-clima').addEventListener('submit', function (e) {
            e.preventDefault();
            const ciudad = document.getElementById('ciudad').value;

            fetch("{{ route('clima.consultar') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ ciudad: ciudad })
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('resultado').innerText = data.error;
                } else {
                    document.getElementById('resultado').innerText = `
Ciudad: ${data.name}
Clima: ${data.weather[0].description}
Temperatura: ${data.main.temp}°C
Humedad: ${data.main.humidity}%
Viento: ${data.wind.speed} m/s
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
