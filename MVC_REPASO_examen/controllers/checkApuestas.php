<?php
// Verificar si el usuario está autenticado y la sesión está configurada correctamente
if (validado()) {
    $_SESSION['vista'] = VIEW . 'login.php';
    $_SESSION['controller'] = CON . 'LoginController.php';
} else {
    // Verificar si se envió el formulario con el botón "Enviar_checks"
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Enviar_checks'])) {
        // Validar los cheques marcados
        $errores = validarCheks([]);
        if (count($errores) == 0) {
            // Si no hay errores, guardar los cheques marcados en la base de datos
            foreach ($_POST['number'] as $numero) {
                // Aquí deberías llamar a una función en tu modelo de apuestas para insertar cada apuesta en la base de datos
                // Por ejemplo: ApuestaModel::insertApuesta($numero);
            }

            // Redirigir a la página de resultados
            $_SESSION['vista'] = VIEW . 'verResultado.php';
            $_SESSION['controller'] = CON . 'checkController.php';
        } else {
            // Si hay errores, manejarlos aquí si es necesario
            print_r($errores);
        }
    }
}
?>
