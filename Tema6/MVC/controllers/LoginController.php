<?php

if(isset($_REQUEST['Login_IniciarSesion'])){
    //ver si nombre y contraseña no estan vacios
    $errores = array();
    if(validarFormulario( $errores)){
        //validado el usuario en la base datos
        $usuario = UserDAO::validarUser($_REQUEST['nombre'],$_REQUEST['pass']);
        //iniciar sesion validada
        if($usuario != null){
            $usuario->fechaUltimaConexion = date('Y-m-d');
            UserDAO::update($usuario);
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW.'home.php';
            unset($_SESSION['controller']);
        }else{
            $errores['validado'] = "No existe el usaurio y contraseña";
        }        
    }
}else if(isset($_REQUEST['Login_Registro'])){
    $_SESSION['vista'] = VIEW.'registro.php';
}
else if(isset($_REQUEST['Registrar_user'])){
    $errores=array();
    if(validarFormularioRegistro($errores)){
        $usuario = new User($_REQUEST['nombre'], $_REQUEST['pass'], $_REQUEST['desc'], date('Y-m-d'), $_REQUEST['perfil']);
        if(UserDAO::insert($usuario)){
            $sms="registrado correctamente";
            $_SESSION['vista'] = VIEW.'login.php';
        }else{
            $errores['validado']="no se ha podido registrar";
        }
    }
    }