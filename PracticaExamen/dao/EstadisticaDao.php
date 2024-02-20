<?php
class EstadisticaDao
{
    public static function findAll(){
        $sql = "select * from estadisticas";
        $parametros = array();
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        $array_estadisticas = array();
        while ($estadisticaStd = $result->fetchObject()) {
            $estadistica = new Estadistica(
                $estadisticaStd->id_estadistica,
                $estadisticaStd->id_usuario,
                $estadisticaStd->id_palabra,
                $estadisticaStd->resultado,
                $estadisticaStd->intentos,
                $estadisticaStd->fecha
            );
            array_push($array_estadisticas, $estadistica);
        }
        return $array_estadisticas;
    }

    public static function findByUserId($id){
        $sql = "select * from estadisticas where id_usuario = ?";
        $parametros = array($id);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        $array_estadisticas = array();
        while ($estadisticaStd = $result->fetchObject()) {
            $estadistica = new Estadistica(
                $estadisticaStd->id_estadistica,
                $estadisticaStd->id_usuario,
                $estadisticaStd->id_palabra,
                $estadisticaStd->resultado,
                $estadisticaStd->intentos,
                $estadisticaStd->fecha
            );
            array_push($array_estadisticas, $estadistica);
        }
        return $array_estadisticas;
    }

    public static function insert($estadistica){
        $sql = "insert into estadisticas (id_usuario, id_palabra, resultado, intentos, fecha) values (?, ?, ?, ?, ?,?)";
        $parametros = array(
            $estadistica->id_estadistica,
            $estadistica->id_usuario,
            $estadistica->id_palabra,
            $estadistica->resultado,
            $estadistica->intentos,
            $estadistica->fecha
        );
        FactoryBd::realizarConsulta($sql, $parametros);
    }
}