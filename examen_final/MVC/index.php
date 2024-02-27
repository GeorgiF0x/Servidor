<?
require('./config/confi.php');
session_start();



if(isset($_REQUEST['login']))
{
    $_SESSION['vista']= VIEW. "login.php";
    require CON.'LoginController.php';
}elseif(isset($_REQUEST['registrar'])){
    $_SESSION['vista']= VIEW. "registro.php";
    require CON.'registroController.php';
}

else if(!isset($_SESSION['usuario'])){
    $_SESSION['vista'] = VIEW .'inicio.php';
}

else if(isset($_REQUEST['Login_CerrarSesion'])){
    session_destroy();
    header('Location: ./index.php');
    exit;
}else{
    require $_SESSION['controlador'];
}


require VIEW.'layout.php';




