<?

$errores = array();
if (isset($_REQUEST['login'])) {

    if (validarFormulario($errores)) {
        //validar usuario 
        $usuario = UserDao::validarUsuario($_REQUEST['nombre'], $_REQUEST['pass']);
        if ($usuario != null) {
            $usuario->fechaUltimaConexion = date('Y-m-d');
            UserDao::update($usuario);
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW . 'home.php';
            unset($_SESSION['controller']);
        } else {
            $errores['validado'] = 'no se ha encontrado';
        }
        //valido
    } else {

    }

} elseif (isset($_REQUEST['registrarse'])) {
    if (validarFormulario($errores)) {
        $usuario = new User($_REQUEST['codUsuarior'], sha1($_REQUEST['passr']), $_REQUEST['descUsuarior'], date('Y-m-d'), 'usuario', true);
        
        if ($usuario != null) {
            UserDao::insert($usuario);
            $_SESSION['vista'] = VIEW . 'home.php';
            $_SESSION['usuario'] = $usuario;
            unset($_SESSION['controller']);
        } else {
            $errores['validado'] = 'no se ha encontrado';
        }
    }
}