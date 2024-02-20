<?

if(isset($_REQUEST['Login_IniciarSesion'])){
    //ver si nombre y contraseña no estan vacios
    $errores = array();
    if(validaFormulario($errores)){
        //validado el usuario en la base de datos
        $usuario = UserDAO::validarUsuario($_REQUEST['nombre'],$_REQUEST['pass']);
        //iniciar sesion validada
        if($usuario != null){
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW.'homePartida.php';
            $_SESSION['controlador'] = CON.'HomeController.php';
            require  $_SESSION['controlador'];
            // unset($_SESSION['controller']);
        } else {
            $errores['validado'] = "No existe el usuario y contraseña";
        }
        //home, pero con modificaciones
    }
} 