<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container" style="max-width: 500px; border: 1px solid #ccc; border-radius: 10px; padding: 20px; background-color: #f8f9fa;">
            <h1 class="text-center mb-4">Recuperar Contraseña</h1>

            <form action="#" method="POST">
                <div class="mb-4">
                    <label for="username" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Ingresa tu nombre de usuario" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Restablecer Contraseña</button>
                </div>
            </form>

            <hr class="my-4">

            <div class="text-center">
                <a href="/login" class="link-primary">Iniciar sesión</a> | 
                <a href="/register" class="link-primary">Registrarse</a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>