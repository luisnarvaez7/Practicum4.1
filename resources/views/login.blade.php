<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container" style="max-width: 900px; border: 1px solid #ccc; border-radius: 10px; overflow: hidden;">
            <div class="row">
                <!-- Sección Izquierda -->
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-start px-5 py-4" style="background-color: #f8f9fa;">
                    <div class="mb-4">
                        <i class="fas fa-crow fa-2x me-3" style="color: #709085;"></i>
                        <span class="h1 fw-bold">Logo</span>
                    </div>
                    <form style="width: 100%; max-width: 400px;">
                        <h3 class="fw-normal mb-4" style="letter-spacing: 1px;">Iniciar sesión</h3>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Correo electrónico</label>
                            <input type="email" id="email" class="form-control form-control-lg" placeholder="Ingresa tu correo" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Contraseña</label>
                            <input type="password" id="password" class="form-control form-control-lg" placeholder="Ingresa tu contraseña" />
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-info btn-lg btn-block w-100" type="submit">Iniciar sesión</button>
                        </div>

                        <p class="small mb-5 pb-lg-2"><a class="text-muted" href="/recover">recuperar contraseña</a></p>
                        <p>¿No tienes una cuenta? <a href="/register" class="link-primary">Registrarse</a></p>
                    </form>
                </div>

                <!-- Sección Derecha -->
                <div class="col-md-6 d-none d-md-block px-0">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp" 
                         alt="Imagen de inicio de sesión" class="img-fluid h-100" style="object-fit: cover; object-position: center;">
                </div>
            </div>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html

                