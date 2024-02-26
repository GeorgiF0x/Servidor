<?php

class Propietario
{
    private $id;
    private $nombre;
    private $direccion;
    private $telefono;
    private $usuario;
    private $contraseña;
    

    function __construct($id, $nombre, $direccion, $telefono, $usuario, $contraseña)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
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