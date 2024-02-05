<?php
require_once "./modelo/instituto.php";
require_once "./dao/FactoryBD.php";

class InstitutoDAO{
    
    public static function findByAll(){
        $sql="SELECT * FROM instituto";
        $stmt=FactoryBD::realizaConsulta($sql, array());
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id){
        $sql="SELECT * FROM instituto WHERE id=?";
        $stmt=FactoryBD::realizaConsulta($sql, array($id));
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByFiltros($filtros){
        $num = count($filtros);
        $parametros = array();
        $sql="SELECT * FROM instituto WHERE ";
         foreach ($filtros as $key => $value) {
             if ($key == 'nombre') {
                 $sql .= $key." LIKE ?";
                 $valor = "%".$value."%";
                 array_push($parametros, $valor);
             }else{
                 $sql .= $key." LIKE ?";   //Cambiar like por = si se quiere que sea exacto
                 $value = "%".$value."%";
                 array_push($parametros, $value);

             }
                if ($num == 2) {  //si hay dos filtros añade el AND, si no, no
                    $num--;
                    $sql .= " AND ";
                }
            }
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            return $result->fetchAll(PDO::FETCH_ASSOC);

        }

    public static function insert($datos){
        $sql="INSERT INTO instituto values (null, ?, ?, ?)";
        $parametros = array($datos->nombre, $datos->localidad, $datos->telefono);
        $stmt=FactoryBD::realizaConsulta($sql, $parametros);
        if ($stmt->rowCount()>0) {

            return true;
        }else{
            return false;
        }    
    }

    public static function findLastId(){
        $sql="SELECT * FROM instituto ORDER BY id DESC LIMIT 1";
        $stmt=FactoryBD::realizaConsulta($sql, array());
         return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function update($instituto){
        $sql="UPDATE instituto SET nombre=?, localidad=?, telefono=? WHERE id=?";
        $parametros = array($instituto->nombre, $instituto->localidad, $instituto->telefono, $instituto->id);
        $stmt=FactoryBD::realizaConsulta($sql, $parametros);
        if ($stmt->rowCount()>0) {

            return true;
        }else{
            return false;
        }    
    }

    public static function delete($id){
        $sql="DELETE FROM instituto WHERE id=?";
        $parametros = array($id);
        $stmt=FactoryBD::realizaConsulta($sql, $parametros);
        if ($stmt->rowCount()>0) {

            return true;
        }else{
            return false;
        }    
    }
}

?>