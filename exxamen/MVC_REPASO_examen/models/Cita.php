<?php

class Cita
{
    private $id;
    private $especialista;
    private $motivo;
    // private $numAccesos;
    private $fecha;
    private $activo;
    private $paciente;

    function __construct($id, $especialista, $motivo, $fecha, $activo = true, $paciente)
    {
        $this->id = $id;
        $this->especialista = $especialista;
        $this->motivo = $motivo;
        $this->fecha = $fecha;
        $this->activo = $activo;
        $this->paciente = $paciente;
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