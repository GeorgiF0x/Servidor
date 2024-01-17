<?
    //si se ha logeado
    //si esta validado llamando si esta validado o no
    if(!validado()){
        $_SESSION['vista']=VIEW.'login.php';
        $_SESSION['controller']=CON.'LoginController.php';
    }else{
        if(isset($_REQUEST['editarUser'])){
            $_SESSION['vista']=VIEW.'editarUser.php';
        }

        if(isset($_REQUEST['User_editar'])){
            $usuario=$_SESSION['usuario'];
            if(!textVacio('desc')){
                $usuario->descUsuario=$_REQUEST['desc'];
                if( UserDAO::update($usuario)){
                    $sms="se ha cambiado correctamente";
                    $_SESSION['vista']=VIEW.'viewUsuario.php';
                }else{
                    $errores['update']="no se ha producido el cambio";
                }
            }else{
                $errores['nombre']='no puede estar vacio';
            }
        }

        if(isset($_REQUEST['Pass_editar'])){
            $usuario=$_SESSION['usuario'];
            if(!textVacio('pass') && !textVacio('Rep_pass') && passIgual($_REQUEST['pass'],$_REQUEST['Rep_pass'])){
                $usuario->password=$_REQUEST['pass'];
                if(UserDAO::UpdatePass($usuario)){
                    $sms="se ha cambiado correctamente la contraseña";
                    $_SESSION['vista']=VIEW.'viewUsuario.php';
                }else{
                    $errores['update']="no se ha producido el cambio en la contraseña";
                }
            }
        }
    }
