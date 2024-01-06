                        <?php
                        // Verifica si se han enviado datos del formulario
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Aquí puedes agregar la lógica para verificar las credenciales y redirigir al usuario si es válido.
                            // En un entorno de producción, también deberías implementar medidas de seguridad adecuadas.
                            $username = $_POST["username"];
                            $password = $_POST["password"];

                            // Ejemplo simple: verifica si el nombre de usuario y la contraseña coinciden
                            if ($username === "usuario" && $password === "contraseña") {
                                header("Location: bienvenido.php");
                                exit();
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Credenciales incorrectas. Por favor, inténtalo de nuevo.</div>';
                            }
                        }
                        ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Agrega los enlaces a los archivos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                                        <div class="row">
                        <div class="col-6">
                            <a class="navbar-brand" href="#">
                                <img class="logo img-responsive" src="../Media/tiburonpng.png" alt="" width="270px">
                            </a>
                        </div>
                     <div class="col-6 d-flex align-items-center">
                        <h2 class="card-title text-center fw-bold">Inicio De Sesion</h2>
                    </div>
                    </div>

                        <form method="post" >
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de user:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </form>

                        <p class="mt-3">¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>