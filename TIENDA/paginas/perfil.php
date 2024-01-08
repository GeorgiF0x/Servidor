<?php

require("../funciones/funcionesBD.php");

// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir al usuario a la página de inicio de sesión si no está autenticado
    header("Location: ../paginas/login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$usuario = getInfoUser($usuario_id);

if (isset($_POST['actualizar_perfil'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $password = $_POST['contrasena'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    //  campos requeridos no  vacíos
    if (!empty($password) && !empty($email) && !empty($fecha_nacimiento)) {
   
        $actualizacionExitosa = actualizarPerfil($usuario_id, $password, $email, $fecha_nacimiento);

        if ($actualizacionExitosa) {
            echo '<meta http-equiv="refresh" content="0">';
            exit();
        } else {
            echo "Error al actualizar el perfil.";
        }
    } else {
        echo " <p class='text-danger'>completa todos los campos.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

</div>
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="card-title text-center">Perfil de Usuario</h2>
                
              
    
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de Usuario:</label>
                        <span class="form-control" id="nombre"><?php echo $usuario['Nombre']; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['Email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $usuario['FechaNacimiento']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</main>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
