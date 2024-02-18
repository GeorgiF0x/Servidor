<?php
$errores = array();

if (validado()) {
    $_SESSION['vista'] = VIEW . 'login.php';
    $_SESSION['controller'] = CON . 'LoginController.php';
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Enviar_checks'])) {
        // Se envió el formulario con el botón "Enviar_checks"
        if (!isset($_POST['number']) || count($_POST['number']) < 5) {
            $errores['number'] = "Debes seleccionar al menos 5 números.";
            $_SESSION['vista'] = VIEW . 'home.php';
            $_SESSION['controller'] = CON . 'checkController.php';
        }

        if (count($errores) == 0) {
            // Formulario procesado correctamente, redirigir a verResultado y checkController
            $_SESSION['vista'] = VIEW . 'verResultado.php';
            $_SESSION['controller'] = CON . 'checkController.php';
        } else {
            // Hay errores en el formulario, manejarlos aquí si es necesario
            print_r($errores);
        }
    }
}
?>




