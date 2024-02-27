<?
$errores = array();


if(isset($_REQUEST['iniciarSesion'])&& validarFormulario($errores)){
    $nombre=$_REQUEST['nombre'];
    $token=$_REQUEST['token'];   
    $usuario = get("user/".$nombre);//lo buscamos en la api por conmbre y contraseña
    $password=get("token/".$token);

    //si lo encuentra por el nombre y la contraseña , existe asique accede
    if($username&& $password){
        //guardar los datos en la sesion si se inicia correctamente
        $_SESSION['usuario']=$username;

        //redirigir al inicio
        $_SESSION['vista']=VIEW. "inicio.php";
        $_SESSION['controlador']=CON."inicioController.php";
    }else{
      $_SESSION['avisos']="No existe el usuario";
    }
    $matriculas = json_decode($matriculas, true);
    $_SESSION['matriculas'] = $matriculas;
}



