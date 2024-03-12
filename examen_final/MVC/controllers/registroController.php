<?php
$errores= array();
if(isset($_REQUEST['volver'])){
    $_SESSION['vista']=VIEW."login.php";
    $_SESSION['controlador']=CON. "LoginController.php";
}



if(isset($_REQUEST['enviarRegistro'])&& validarRegistro($erroes)){
    //hacer POST con los datos del formulario
    $username=$_REQUEST['email'];
    $token=generarToken();
    $caduca=  date("Y-m-d H:i:s",strtotime("+10 days")); 
    $array = array("user" => $username, "token" => $token,"caduca"=>$caduca);
    post("usuario", $array);
    
}

