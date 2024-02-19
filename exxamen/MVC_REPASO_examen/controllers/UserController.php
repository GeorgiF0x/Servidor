<?
// login 
// session_start();
//funcion que conpruebe si se ha hecho login
if (!validado()) {
    $_SESSION['vista'] = VIEW . 'login.php';
    $_SESSION['controller'] = CON . 'LoginController.php';
} else {
    if (isset($_REQUEST['editar'])) {
        $_SESSION['vista'] = VIEW . 'editarUser.php';
    } elseif (isset($_REQUEST['cambiar'])) {
        //comprubo que estan llenos los campos

        $usuario = $_SESSION['usuario'];
        $usuario->descUsuario = $_REQUEST['nombrenuevo'];
        $usuario->password = sha1($_REQUEST['passnuevo']);
        if (UserDao::update($usuario)) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW . 'verUsuario.php';
        } else
            $errores['update'] = 'no se ha podido modificar';
        //updateo los campos en la bd
    }
}



