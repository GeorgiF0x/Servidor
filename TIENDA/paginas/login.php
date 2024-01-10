<?php
require("../funciones/funcionesBD.php");
require("../funciones/funcionesSesion.php");
require("../funciones/validarFormulario.php");

session_start();

$errores = array(); // Array para almacenar mensajes de error

if ($_SERVER["REQUEST_METHOD"] == "POST") { //si se ha mandado 
    // Validar campos
    if (textoVacio('username')) {
        $errores['username'] = 'Por favor, introduce un nombre de usuario.';
    }

    if (textoVacio('password')) {
        $errores['password'] = 'Por favor, introduce una contraseña.';
    }

    // Si no hay errores, intentar iniciar sesión
    if (count($errores) == 0) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $resultado = verificarUser($username, $password);

        if ($resultado === true) {
            // Redirigir al usuario después de iniciar sesión
            header("Location: ../index.php");
            exit();
        } else {
            $errores['login'] = 'Datos incorrectos. Introduce un usuario y contraseña correctos.';
        }
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
                                <a class="navbar-brand" href="../index.php">
                                    <img class="logo img-responsive" src="../Media/tiburonpng.png" alt="" width="270px">
                                </a>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <h2 class="card-title text-center fw-bold">Inicio De Sesion</h2>
                            </div>
                        </div>

                        <form method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de usuario:</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php recuerda('username'); ?>" >
                                <?php printerror($errores, 'username'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password" >
                                <?php printerror($errores, 'password'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </form>

                        <?php
                        if (!empty($errores['login'])) {
                            echo '<p class="text-danger mt-3">' . $errores['login'] . '</p>';
                        }
                        ?>

                        <p class="mt-3">¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

