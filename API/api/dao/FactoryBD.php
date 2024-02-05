<?
require('./config/confiBD.php');
class FactoryBd
{
    public static function realizarConsulta($sql, $array_parametros)
    {

        try {
            $conn = new PDO('mysql:host=' . IP . ';dbname=' . BD, USER, PASS);
            $stmt = $conn->prepare($sql);
            $stmt->execute($array_parametros);

        } catch (PDOException $e) {
            Base::response("HTTP/1.0 400 Error interno servidor",$e->getMessage() );
            unset($conn);
        }
        return $stmt;
    }
}