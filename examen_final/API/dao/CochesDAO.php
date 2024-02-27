<?php

require("./modelo/Coche.php");
require_once("./dao/factoryBD.php");

class CochesDAO{

    public static function findAll(){
        $sql = "SELECT * FROM CochesDeSegundaMano";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id){
        $sql = "SELECT * FROM CochesDeSegundaMano WHERE id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
  


 

    public static function insert($coche){
       $sql="INSERT INTO CochesDeSegundaMano (marca, modelo,año_fabricacion,kilometraje,precio,color,descripcion) VALUES (?,?,?,?,?,?,?)";
       $parametros = array($coche->marca,
        $coche->modelo,
        $coche->ano_fabricacion,
        $coche->kilometraje,
        $coche->precio,
        $coche->color,
        $coche->descripcion);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0){
            return true;
        }

    }

 

    public static function findbyFiltros($filtros){
        
        $num = count($filtros);
        $parametros = array();
        $sql = "SELECT * FROM  CochesDeSegundaMano WHERE ";
        
        foreach ($filtros as $key => $value) {
            if($key == 'modelo'|| $key=="marca" || $key=="descripcion"){
                $sql .= $key ." LIKE ?";
                $valor = '%'.$value.'%';
                array_push($parametros,$valor);
            }
            else{
                $sql .= $key ." = ? ";
                array_push($parametros,$value);
            }

            if($num == 2){
                $num--;
                $sql .= ' and ';
            }
        
        }

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }



   

}

    


?>