<?php
require_once "./modelo/producto.php";
require_once "./dao/FactoryBD.php";

class ProductoDAO{
    
    public static function findByAll(){
        $sql="SELECT * FROM PRODUCTO";
        $stmt=FactoryBD::realizaConsulta($sql, array());
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id){
        $sql="SELECT * FROM PRODUCTO WHERE codigo=?";
        $stmt=FactoryBD::realizaConsulta($sql, array($id));
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByFiltros($filtros){
        $num = count($filtros);
        $parametros = array();
        $sql="SELECT * FROM PRODUCTO WHERE ";
         foreach ($filtros as $key => $value) {
             if ($key == 'titulo' || $key == 'descripcion') {
                 $sql .= $key." LIKE ?";
                 $valor = "%".$value."%";
                 array_push($parametros, $valor);
             }else if ($key == 'codigo') {
                 $sql .= $key." = ?";
                 array_push($parametros, $value);
             }

                if ($num >= 2) {  //si hay dos o mas filtros añadimos el AND
                    $num--;
                    $sql .= " AND ";
                }
            }
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            return $result->fetchAll(PDO::FETCH_ASSOC);

        }

    public static function insert($datos){
        $sql="INSERT INTO PRODUCTO values (null, ?, ?, ?, ?, ?, 1)";
        $parametros = array($datos->titulo, $datos->descripcion, $datos->precio, $datos->stock, $datos->image_url);
        $stmt=FactoryBD::realizaConsulta($sql, $parametros);
        if ($stmt->rowCount()>0) {

            return true;
        }else{
            return false;
        }    
    }

    public static function findLastId(){
        $sql="SELECT * FROM PRODUCTO ORDER BY codigo DESC LIMIT 1";
        $stmt=FactoryBD::realizaConsulta($sql, array());
         return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function update($producto){
        $sql="UPDATE PRODUCTO SET titulo=?, descripcion=?, precio=?, stock=?, imagen_url=? WHERE codigo=?";
        $parametros = array($producto->titulo, $producto->descripcion, $producto->precio, $producto->stock, $producto->imagen_url, $producto->codigo);
        $stmt=FactoryBD::realizaConsulta($sql, $parametros);
        if ($stmt->rowCount()>0) {

            return true;
        }else{
            return false;
        }    
    }

    public static function delete($codigo){
        $sql="DELETE FROM PRODUCTO WHERE codigo=?";
        $parametros = array($codigo);
        $stmt=FactoryBD::realizaConsulta($sql, $parametros);
        if ($stmt->rowCount()>0) {

            return true;
        }else{
            return false;
        }    
    }
}

?>