<?php

class Estadisctica
{
    private $id_estadistica;
    private $id_usuario;
    private $id_palabra;
    private $resultado;
    private $intentos;
    private $fecha;

    

    function __construct($id_estadistica, $id_usuario, $num_letras, $resultado, $intentos, $fecha)
    {
        $this->id_estadistica = $id_estadistica;
        $this->id_usuario = $id_usuario;
        $this->num_letras = $num_letras;
        $this->resultado = $resultado;
        $this->intentos = $intentos;
        $this->fecha = $fecha;
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