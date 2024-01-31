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


    public static function findByFiltros($filtros){
        $num=count($filtros);
        $parametros= array();
        $sql = "SELECT * FROM Institutos WHERE ";
        foreach ($filtros as $key => $value) {
            if($key=="Nombre"){
                $sql.=$key."LIKE ?";
                $valor="%".$value."%";
                array_push($parametos,$valor);
            }else{
                $sql.=$key." = ? ";
                array_push($parametros,$value);
            } 
             if($num ==2){
                $num--;
                $num.= "and";
            }
        } 
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return $result->fetch(PDO::FETCH_ASSOC);
        
    }


    public static function Insert($instituto){
        $sql="Insert into Institutos values (null,?,?,?)";
        $parametros = array(
            $instituto->Nombre,
            $instituto->Localidad,
            $instituto->Telefono,
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if($result->rowCount()>0){
            return true;
        }
    }

    public static function LastInsert(){
        $sql = "select * from Institutos order by desc limit 1";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_insitutos = array();
        echo "<pre>";
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public static function update($instituto){
        $sql="update insitutos set Nombre = ? Localidad = ? Telefono = ? where ID = ?";
        $parametros = array(
            $instituto->Nombre,
            $instituto->Localidad,
            $instituto->Telefono,
            $instituto->ID
        );
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
        return false;
    }


    



    
    
  
}