<?

    require ("../dao/FactoryBD.php");
    require ("../models/Palabra.php");
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
    public static function findById($id)
    {
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
    public static function insert($palabra)
    {
        $sql = "INSERT INTO palabras (id_palabra,palabra,num_letras)VALUES (?, ?, ?)";

        $parametros = array(
            $palabra->id_palabra,
            $palabra->palabra,
            $palabra->num_letras
        );
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        return true;
    }



    //opcionales





}
