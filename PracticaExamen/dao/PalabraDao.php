<?
class PalabraDao
{

    public static function findAll()
    {
        $sql = "select * from palabras";
        $parametros = array();
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        $array_palabras = array();
        while ($palabraStd = $result->fetchObject()) {
            $palabra = new Palabra(
                $palabraStd->id_palabra,
                $palabraStd->palabra,
                $palabraStd->num_letras
            );
            array_push($array_palabras, $palabra);
        }
        return $array_palabras;
    }

    public static function findById($id){
        $sql = "select * from palabras where id_palabra = ?";
        $parametros = array($id);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $palabraStd = $result->fetchObject();
            $palabra = new Palabra(
                $palabraStd->id_palabra,
                $palabraStd->palabra,
                $palabraStd->num_letras
            );
            return $palabra;
        } else
            return null;
    }

    public static function findRandom(){
        $sql = "select * from palabras order by rand() limit 1";
        $parametros = array();
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $palabraStd = $result->fetchObject();
            $palabra = new Palabra(
                $palabraStd->id_palabra,
                $palabraStd->palabra,
                $palabraStd->num_letras
            );
            return $palabra;
        } else
            return null;
    }
}