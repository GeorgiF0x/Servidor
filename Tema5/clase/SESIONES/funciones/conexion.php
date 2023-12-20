<?php




require ("/var/www/Servidor/Tema5/clase/SESIONES/funciones/configBD.php");


function validarUsuario($user, $pass) {
    try {
        $DSN = 'mysql:host=' . IP . ';dbname=sesiones';
        $con = new PDO($DSN, USER, PASS);
        
        $sql = "select * from usuarios where usuario = ? and clave = ?";
        $stmt = $con->prepare($sql);
        $pass=sha1($pass);
        $stmt->execute([$user, $pass]); 
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            return $usuario;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        
        echo $e->getMessage();
    } finally {
        
        unset($con);
    }
}


function misPaginas(){
    try {
        $DSN = 'mysql:host=' . IP . ';dbname=sesiones';
        $con = new PDO($DSN, USER, PASS);
        
        $sql = "select url from paginas where codigo in 
        (select codigoPagina from accede where codigoPerfil= ?)";
        $stmt = $con->prepare($sql);
        $stmt->execute($_SESSION['usuario']['perfil']);
        $paginas=array();
        while ($pagina= $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($paginas,$pagina['url']);
        }
        if(count($paginas)>0){
            $_SESSION['usuario']['paginas']=$paginas;
            return $paginas;
        }else{
            return false;
        }
  
    } catch (PDOException $e) {
        
        echo $e->getMessage();
    } finally {
        
        unset($con);
    }
}

function sesionIniciada(){
    if(!isset($_SESSION['usuario'])){
        $_SESSION['error']="no tienes permiso para entrar a la pagina USER";
        header('Location : ./login.php');
        exit;
    }
}
function permisosPagina($url){
   if(!in_array($url,$_SESSION['usuario']['paginas'])){
    $_SESSION['error']="no tienes permiso para ir a la pagina" .$url;
    header( "Location ./login.php");
   }
}









