<?


    if(isset($_REQUEST['Login_IniciarSesion'])){
        //ver que los campos del login no esten vacios
        $errores=array();
        if(validarFormulario($errores)){
            //se ha validado de forma correcta el usuario
            $usuario=UserDAO::validarUser($_REQUEST['nombre'],$_REQUEST['pass']);
            //iniciar una sesion validada no una session_start
            if($usuario!=null){
                $usuario->FechaUltimaConexion=date('Y m:d');
                UserDAO::update($usuario);
                $_SESSION['usuario']=$usuario;
                $_SESSION['vista']=VIEW.'home.php';
                unset($_SESSION['controller']);
            }else{
                $errores['validado']= "No se ha encontrado el usuario";
            }
        }else{

        }
    }else if(isset($_REQUEST['Login_Registro'])){
        
    }