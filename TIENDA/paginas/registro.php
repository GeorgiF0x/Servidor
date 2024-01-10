<?php
require("../funciones/funcionesBD.php");
require("../funciones/validarFormulario.php");

$errores = array(); // Inicializa el array de errores

if (isset($_POST['registro'])) {
    // Obtén los datos del formulario
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    $repContrasena = $_POST["Repcontrasena"];
    $email = $_POST["email"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    // Perfil predeterminado para los nuevos usuarios: Cliente
    $perfil = 'Cliente';

    // Validar el formulario y almacenar errores en el array
    $errores = validarRegistro($_POST);

    if (empty($errores)) {
        // No hay errores, procede con el registro

        // Asegúrate de que la fecha de nacimiento no esté vacía antes de insertar
        if (!empty($fechaNacimiento)) {
            $insertarUsuario = insertarUsuario($nombre, $contrasena, $email, $fechaNacimiento, $perfil);

            if ($insertarUsuario) {
                // Usuario registrado con éxito, redirige a la página de inicio de sesión
                header("Location: login.php");
                exit();
            } else {
                // Error al registrar el usuario
                echo "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
            }
        } else {
            // La fecha de nacimiento está vacía, maneja el error como desees
            $errores[] = "Error: La fecha de nacimiento no puede estar vacía.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="card-title text-center">Registrarse</h2>
            <!-- para los errores -->
            <?php
            if (!empty($errores)) {
                echo '<div class="alert alert-danger" role="alert">';
                foreach ($errores as $error) {
                    echo "<p class='mb-0'>$error</p>";
                }
                echo '</div>';
            }
            ?>
            <form method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php recuerda('nombre'); ?>">
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena">
                </div>
                <div class="mb-3">
                    <label for="Repcontrasena" class="form-label">Repetir Contraseña:</label>
                    <input type="password" class="form-control" id="Repcontrasena" name="Repcontrasena">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php recuerda('email'); ?>">
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php recuerda('fecha_nacimiento'); ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="registro">Registrarse</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



