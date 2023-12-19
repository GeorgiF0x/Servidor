<?php




require ("/var/www/Servidor/Tema5/clase/SESIONES/funciones/configBD.php");


function validarUsuario($user, $pass) {
    try {
        $DSN = 'mysql:host=' . IP . ';dbname=sesiones';
        $con = new PDO($DSN, USER, PASS);
        
        $sql = "select * from usuarios where nombre = ? and clave = ?";
        $stmt = $con->prepare($sql);
        $pass=sha1($pass);
        $usuario=$stmt->execute([$user, $pass]); 
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario){
            return $usuario;
        }else{
            return false;
        }

    } catch (PDOException $e) {
        // Manejo de excepciones
        echo $e->getMessage();
    } finally {
        // Cierra la conexión en el bloque finally para asegurarte de que siempre se cierre
        unset($con);
    }
}

function verificarPermisos($perfil){
    $DSN = 'mysql:host=' . IP . ';dbname=sesiones';
        $con = new PDO($DSN, USER, PASS);
        
        $sql = "select perfil from usuarios where usuarios  = ?";
        $stmt = $con->prepare($sql);
        $Permisousuario=$stmt->execute([$perfil]); 
        $Permisousuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if($Permisousuario){
            return $Permisousuario;
        }else{
            return false;
        }
        

    if($usuario){
            return $usuario;
        }else{
            return false;
        }
      
}







