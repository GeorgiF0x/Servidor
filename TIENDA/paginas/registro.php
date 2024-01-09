<?php
require("../funciones/funcionesBD.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    $email = $_POST["email"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];

    // Establece el perfil predeterminado para los nuevos usuarios Cliente
    $perfil = 'Cliente';

    // Inserta el nuevo usuario en la base de datos
    $insertarUsuario = insertarUsuario($nombre, $contrasena, $email, $fechaNacimiento, $perfil);

    if ($insertarUsuario) {
        // Usuario registrado con éxito, redirige a la página de inicio de sesión
        header("Location: login.php");
        exit();
    } else {
        // Error al registrar el usuario
        echo "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
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
            <form  method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>