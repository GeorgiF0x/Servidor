<?

require './config/config.php';

//instanciar la sesion
session_start();

//si no le ha dado a inciar sesion o no esta validado
if(isset($_REQUEST['Login_IniciarSesion']))
{
    require CON.'LoginController.php';
}
else if(!isset($_SESSION['usuario'])){
    $_SESSION['vista'] = VIEW .'login.php';
}else if(isset($_REQUEST['Login_CerrarSesion'])){
    session_destroy();
    header('Location: ./index.php');
    exit;
}


require VIEW.'layout.php';
