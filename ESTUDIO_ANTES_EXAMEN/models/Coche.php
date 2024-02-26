<?php

class Coche
{
  private $id;
  private $marca;
  private $modelo;
  private $anio;
  private $color;
  private $precio;
  private $propietario_id;
    

    function __construct($id, $marca, $modelo, $anio, $color, $precio, $propietario_id)
    {
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anio = $anio;
        $this->color = $color;
        $this->precio = $precio;
        $this->propietario_id = $propietario_id;
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