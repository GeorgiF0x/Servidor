<?php
require ('./config/confBD.php');

class FactoryBD{
    
    public static function realizaConsulta($sql, $array_parametros){
        try{
            $con = new PDO("mysql:host=".IP.";dbname=".BBDD, USER, PASS);
            $stmt = $con->prepare($sql);
            $stmt->execute($array_parametros);
           
        }catch(PDOException $e){
            // $stmt = null;
            Base::response('HTTP/1.1 500 Error interno del servidor'.$e->getMessage());
            unset($con);
        }
        return $stmt;
    
    }
}

?>