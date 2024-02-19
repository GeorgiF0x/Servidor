<?php

class Estadistica
{   
    private $id_estadistica;
    private $id_usuario;
    private $id_palabra;
    private $resultado;
    private $intentos;
    private $fecha;

    function __construct($id_estadistica, $id_usuario, $id_palabra,$resultado,$intentos)
    {
        $this->id_estadistica= $id_estadistica;
        $this->id_usuario = $id_usuario;
        $this->id_palabra = $id_palabra;
        $this->resultado = $resultado;
        $this->intentos = $intentos;
    }

    public function __get($att)
    {
        return $this->$att;
    }
    public function __set($att, $val)
    {
        if (property_exists(__CLASS__, $att)) {
            return $this->$att = $val;
        } else {
            echo 'No existe el atributo "' . $att . '"';
        }
    }
}

?>