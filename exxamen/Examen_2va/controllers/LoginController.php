<?php
$errores = array();

if (isset($_REQUEST['login'])) {
    if (validarFormulario($errores)) {
        // Validar usuario
        $usuario = UserDao::validarUsuario($_REQUEST['nombre'], $_REQUEST['pass']);
        if ($usuario != null) {
            echo"estas logeado";
            // Verificar si se marcó el checkbox de "recordar"
            if (isset($_REQUEST['recordar']) && $_REQUEST['recordar'] == 'recordar') {
                // marcado establecer una cookie para recordar la sesión
                setcookie('recordar', 'true', time() + (86400 * 30), "/"); // Cookie  por 30 días
                $_COOKIE['recordar']['nombre']=$_REQUEST['nombre'];
                $_COOKIE['recordar']['pass']=$_REQUEST['pass'];
                $usuario->username=$_COOKIE['recordar']['username'];
                $usuario->password=$_COOKIE['recordar']['pass'];
            } else {
                // desmarcada, eliminar la cookie 
                setcookie('recordar', '', time() - 3600, "/"); 
            }
            $_SESSION['vista'] = VIEW . 'home.php';
            unset($_SESSION['controller']);
         
        } else {
            $errores['validado'] = 'Usuario no encontrado';
        }
    }
}

?>

