<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta del Clima</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
        }
        .weather-card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
        }
        .weather-card:hover {
            transform: translateY(-5px);
        }
        .weather-icon {
            font-size: 40px;
        }
    </style>
</head>
<body class="p-4">

    <div class="container">
        <h2 class="text-center mb-4">Consulta del Clima</h2>

        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <form id="form-clima" class="input-group">
                    <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ingresa una ciudad" required>
                    <button class="btn btn-primary" type="submit">Consultar</button>
                </form>
            </div>
        </div>

        <div id="resultado" class="row justify-content-center g-3"></div>
    </div>

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
                const resultado = document.getElementById('resultado');
                if (data.error) {
                    resultado.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                } else {
                    resultado.innerHTML = `
                        <div class="col-md-2">
                            <div class="card weather-card text-center p-3 bg-light">
                                <h5>Ciudad</h5>
                                <div class="weather-icon">📍</div>
                                <p>${data.name}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card weather-card text-center p-3 bg-light">
                                <h5>Clima</h5>
                                <div class="weather-icon">🌦️</div>
                                <p>${data.weather[0].description}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card weather-card text-center p-3 bg-light">
                                <h5>Temp.</h5>
                                <div class="weather-icon">🌡️</div>
                                <p>${data.main.temp}°C</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card weather-card text-center p-3 bg-light">
                                <h5>Humedad</h5>
                                <div class="weather-icon">💧</div>
                                <p>${data.main.humidity}%</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card weather-card text-center p-3 bg-light">
                                <h5>Viento</h5>
                                <div class="weather-icon">💨</div>
                                <p>${data.wind.speed} m/s</p>
                            </div>
                        </div>
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
