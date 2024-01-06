<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="card-title text-center">Perfil de Usuario</h2>
            
            <?php
                // Aquí puedes recuperar la información del usuario desde la base de datos
                // y prellenar los campos del formulario con esa información.
                // Por ahora, se proporciona un formulario de ejemplo.
                
                $usuario = [
                    'nombre' => 'UsuarioEjemplo',
                    'email' => 'usuario@example.com',
                    'fecha_nacimiento' => '1990-01-01'
                ];
            ?>

            <form action="procesar_perfil.php" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de Usuario:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $usuario['fecha_nacimiento']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
