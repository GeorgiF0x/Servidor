<?

if(isset($_REQUEST['login'])){
    //ver si nombre y contraseña no estan vacios
        $errores = array();
        if(validarFormulario($errores)){
            //validado el usuario en la base de datos
            //crear el usuario apartir de validar el usuario
            $usuario = PropietariosDao::validarPropietario($_REQUEST['nombre'],$_REQUEST['pass']);
            // if($usuario){
            //     echo "usuario validado";
            // }
            if(isset($_REQUEST['recordar'])){
                setcookie('username', $_REQUEST['nombre'], time() + 60*60*24*365); // 1 año
            }else{
                setcookie('username', $_REQUEST['nombre'], time() - 3600 );
            }

            if($usuario){
                $_SESSION['usuario'] = $usuario;
                $_SESSION['vista'] = VIEW.'homePropietarios.php';
                $_SESSION['controlador'] = CON.'PropietariosController.php';
            }
        } 
} 

