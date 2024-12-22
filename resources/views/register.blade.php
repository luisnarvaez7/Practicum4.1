<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro de paciente</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .form-container {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .form-container h1 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .input-group {
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Registro de paciente</h1>
        <form class="row g-3" method="get">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon0">Username</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon0" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
                <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Apellido</span>
                <input type="text" class="form-control" placeholder="Apellido" aria-label="Apellido" aria-describedby="basic-addon2" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Cédula</span>
                <input type="text" class="form-control" placeholder="Cédula" aria-label="Cédula" aria-describedby="basic-addon3" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Sexo</span>
                <select class="form-select" aria-label="Sexo" required>
                    <option selected disabled>Seleccionar...</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon4">Correo</span>
                <input type="email" class="form-control" placeholder="Correo" aria-label="Correo" aria-describedby="basic-addon4" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon5">Dirección</span>
                <input type="text" class="form-control" placeholder="Dirección" aria-label="Dirección" aria-describedby="basic-addon5" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon6">Teléfono</span>
                <input type="tel" class="form-control" placeholder="Teléfono" aria-label="Teléfono" aria-describedby="basic-addon6" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon7">Seguro</span>
                <input type="text" class="form-control" placeholder="Seguro" aria-label="Seguro" aria-describedby="basic-addon7" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon8">Contraseña</span>
                <input type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon8" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon9">Confirmar Contraseña</span>
                <input type="password" class="form-control" placeholder="Confirmar Contraseña" aria-label="Confirmar Contraseña" aria-describedby="basic-addon9" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
