<?

require ("./modelo/Instituto.php");
require ("./dao/FactoryBD.php");
class InstitutoDAO{

    public static function findAll(){
        $sql = "select * from Institutos";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        
        $array_insitutos = array();
 
        // return array con todos los User
        echo "<pre>";
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByID($id){
        $sql = "SELECT * FROM Institutos WHERE ID = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        
        if($result->rowCount() == 1){
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
    



    
    
  
}