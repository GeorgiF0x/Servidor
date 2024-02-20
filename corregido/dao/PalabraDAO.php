<?
class PalabraDAO{
public static function findAleatorio(){
    $sql = 'select * from palabras order by rand() limit 1';
    $parametros = array();
    $result = FactoryBD::realizaConsulta($sql,$parametros);
    return $result->fetchAll();
}

}