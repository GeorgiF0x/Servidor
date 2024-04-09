<?
require('./config/confi.php');
session_start();



if(isset($_REQUEST['login']))
{
    require CON.'LoginController.php';
}
else if(!isset($_SESSION['usuario'])){
    $_SESSION['vista'] = VIEW .'home.php';
}
else if(isset($_REQUEST['Login_CerrarSesion'])){
    session_destroy();
    header('Location: ./index.php');
    exit;
}else{
    require $_SESSION['controlador'];
}


require VIEW.'layout.php';




