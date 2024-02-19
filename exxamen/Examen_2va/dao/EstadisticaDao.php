<?
class EstadisticaDao
{

    public static function findAll()
    {
        $sql = "select * from estadisticas";
        $parametros = array();
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        $array_estadisticas = array();
        while ($estadisticastd = $result->fetchObject()) {
            $estadistica = new Estadistica(
                $estadisticastd->id_estadistica,
                $estadisticastd->id_usuario,
                $estadisticastd->id_palabra,
                $estadisticastd->resultado,
                $estadisticastd->intentos,
                $estadisticastd->fecha
            );
            array_push($array_estadisticas, $estadistica);
        }
        return $array_estadisticas;
    }
    public static function findById($id)
    {
        $sql = "select * from estadisticas where id_estadistica = ?";
        $parametros = array($id);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $estadisticastd = $result->fetchObject();
            $estadistica = new Estadistica(
                $estadisticastd->id_estadistica,
                $estadisticastd->id_usuario,
                $estadisticastd->id_palabra,
                $estadisticastd->resultado,
                $estadisticastd->intentos,
                $estadisticastd->fecha
            );
            return $estadistica;
        } else
            return null;
    }
    public static function insert($estadistica)
    {
        $sql = "INSERT INTO estadisticas (id_palabra,id_usuario,id_palabra,resultado,intentos,fecha)VALUES (?, ?, ?,?,?,?)";

        $parametros = array(
            $estadistica->id_estadistica,
            $estadistica->id_usuario,
            $estadistica->id_palabra,
            $estadistica->resultado,
            $estadistica->intentos,
            $estadistica->fecha
        );
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        return true;
    }



    //opcionales





}
