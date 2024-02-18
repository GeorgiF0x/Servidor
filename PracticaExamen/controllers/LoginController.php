<?

if(isset($_REQUEST['login'])){
    //ver si nombre y contraseña no estan vacios
    $errores = array();
    if(validarFormulario($errores)){
        //validado el usuario en la base de datos
        $usuario = UserDAO::validarUsuario($_REQUEST['nombre'],sha1($_REQUEST['pass']));
        //iniciar sesion validada
        if(isset($_REQUEST['recordar'])){
            setcookie('username', $_REQUEST['nombre'], time() + 3600);
            setcookie('password', $_REQUEST['pass'], time() + 3600);
        }else{
            setcookie('username', $_REQUEST['nombre'], time() - 3600);
            setcookie('password', $_REQUEST['pass'], time() - 3600);
        }
        if($usuario != null){
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW.'inicioPartida.php';
            $_SESSION['controlador'] = CON.'inicioPartidaController.php';
            require  $_SESSION['controlador'];
            // unset($_SESSION['controller']);
        } else {
            $errores['validado'] = "No existe el usuario y contraseña";
        }
        //home, pero con modificaciones
    }
} 

