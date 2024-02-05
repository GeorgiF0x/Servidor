<?php
class Instituto{

    private $id;
    private $nombre;
    private $localidad;
    private $telefono;


    public function __construct($id, $nombre, $localidad, $telefono){
        $this->id = $id;
        $this->nombre= $nombre;
        $this->localidad= $localidad;
        $this->telefono= $telefono;

    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        if(property_exists(__CLASS__,$atributo)) //Comprueba si existe el atributo
        $this->$atributo=$valor;
         else echo "No existe el atributo $atributo";
    
    }


}


    ?>