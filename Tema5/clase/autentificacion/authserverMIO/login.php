<?
require("./seguro/datos.php");
// si existe usuario  logeado
if(isset ($_SERVER['PHP_AUTH_USER']) && isset ($_SERVER['PHP_AUTH_PW'])){
   if($_SERVER['PHP_AUTH_USER']==USER && hash('sha256',($_SERVER['PHP_AUTH_PW']))==PASS){
        header('Location: ./paginaUser.php');
   }else{
    header ('WWW-Authenticate: Basic Realm="Contenido restringido');
    header ('HTTP/1.0 401 Unauthorized');
   }    
}else{
    header ('WWW-Authenticate: Basic Realm="Contenido restringido');
    header ('HTTP/1.0 401 Unauthorized');
    exit;
}