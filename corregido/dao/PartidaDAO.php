<?

class PartidaDAO{
    public static function findAllEstadisticas(){
        $sql = "select * from estadisticas";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);

        $array_estadisticas = array();
        while ($estadisticaStd = $result->fetchObject()) { // $id_estadistica, $id_usuario, $id_palabra, $resultado, $intentos, $fecha
            $estadistica = new Estadistica(
                $estadisticaStd->id_estadistica,
                $estadisticaStd->id_usuario,
                $estadisticaStd->id_palabra,
                $estadisticaStd->resultado,
                $estadisticaStd->intentos,
                $estadisticaStd->fecha
            );
            array_push($array_estadisticas,$estadistica);
        }

        //return array con todos los User
        return $array_estadisticas;
    }

    public static function findByUser($id){
        $sql = "select * from estadisticas where id_usuario = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);

        $array_estadisticas = array();
        while ($estadisticaStd = $result->fetchObject()) { // $id_estadistica, $id_usuario, $id_palabra, $resultado, $intentos, $fecha
            $estadistica = new Estadistica(
                $estadisticaStd->id_estadistica,
                $estadisticaStd->id_usuario,
                $estadisticaStd->id_palabra,
                $estadisticaStd->resultado,
                $estadisticaStd->intentos,
                $estadisticaStd->fecha
            );
            array_push($array_estadisticas,$estadistica);
        }

        //return array con todos los User
        return $array_estadisticas;
    }
}