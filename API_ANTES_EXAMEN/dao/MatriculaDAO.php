<?php

require("./modelo/Matricula.php");
require("./dao/factoryBD.php");

class MatriculaDAO{

    public static function findAll(){
        $sql = "SELECT * FROM matriculas";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id){
        $sql = "SELECT * FROM matriculas WHERE id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findLast(){
        $sql = "SELECT * FROM matriculas ORDER BY id DESC LIMIT 1";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update($matricula){
        $sql="UPDATE matriculas SET coche_id = ?, matricula = ? WHERE id = ?";
        $parametros = array($matricula->coche_id, $matricula->matricula, $matricula->id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0){
            return true;
        }
    }

    //desc de matircula 
    //   id        | int         | NO   | PRI | NULL    | auto_increment |
    // | coche_id  | int         | YES  | MUL | NULL    |                |
    // | matricula | varchar(20)
    // no meter id es auto incremental
    public static function insert($matricula){
       $sql="INSERT INTO matriculas (coche_id, matricula) VALUES (?,?)";
       $parametros = array($matricula->coche_id, $matricula->matricula);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0){
            return true;
        }

    }

    public static function delete($id){
        $sql = "DELETE FROM matriculas WHERE id = ?";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0){
            return true;
        }
    }

    public static function findbyFiltros($filtros){
        
        $num = count($filtros);
        $parametros = array();
        $sql = "SELECT * FROM  matriculas WHERE ";
        
        foreach ($filtros as $key => $value) {
            if($key == 'matricula'){
                $sql .= $key ." LIKE ?";
                $valor = '%'.$value.'%';
                array_push($parametros,$valor);
            }else{
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

    public static function findRandom(){
        $sql = "SELECT * FROM matriculas ORDER BY RAND() LIMIT 1";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByCocheId($coche_id){
        $sql = "SELECT * FROM matriculas WHERE coche_id = ?";
        $parametros = array($coche_id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}

    


?>