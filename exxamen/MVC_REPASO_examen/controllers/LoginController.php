<?php
$errores = array();

if (isset($_REQUEST['login'])) {
    if (validarFormulario($errores)) {
        // Validar usuario
        $usuario = UserDao::validarUsuario($_REQUEST['nombre'], $_REQUEST['pass']);
 
        
        

            // Verificar si se marcó el checkbox de "recordar"
            if (isset($_REQUEST['recordar']) && $_REQUEST['recordar'] == 'recordar') {
                // Si se marcó, establecer una cookie para recordar la sesión
                setcookie('recordar', 'true', time() + (86400 * 30), "/"); // Cookie válida por 30 días
            } else {
                // Si no se marcó, eliminar la cookie estableciendo su tiempo de expiración en el pasado
                setcookie('recordar', '', time() - 3600, "/"); // Establecer la cookie en el pasado
            }

            $_SESSION['vista'] = VIEW . 'home.php';
            unset($_SESSION['controller']);

        }
    }
// } elseif (isset($_REQUEST['registrarse'])) {
//     if (validarFormulario($errores)) {
//         $usuario = new User($_REQUEST['codUsuarior'], sha1($_REQUEST['passr']), $_REQUEST['descUsuarior'], date('Y-m-d'), 'usuario', true);
        
//         if ($usuario != null) {
//             UserDao::insert($usuario);
//             $_SESSION['vista'] = VIEW . 'home.php';
//             $_SESSION['usuario'] = $usuario;
//             unset($_SESSION['controller']);
//         } else {
//             $errores['validado'] = 'Usuario no encontrado';
//         }
//     }
// }
?>

