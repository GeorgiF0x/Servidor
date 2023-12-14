<?
require("./seguro/datos.php");
require("./funciones.php");

if(isset ($_SERVER['PHP_AUTH_USER']) && isset ($_SERVER['PHP_AUTH_PW'])){
    if($_SERVER['PHP_AUTH_USER']!=USER || hash('sha256',($_SERVER['PHP_AUTH_PW']))!=PASS){
        if(isUser())
        header('Location: ./index.php');
        exit;
    }    
}else{
    header('Location ./index.php');
    exit;
}

?>
<h2>User</h2>
<a href="./cerrar.php">Cerrar Sesion</a>
<?
echo 'eres el usuario :'. $_SERVER['PHP_AUTH_USER'];