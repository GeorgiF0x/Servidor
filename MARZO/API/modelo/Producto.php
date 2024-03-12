<?php

class Producto{
private $Id;
private $Nombre;
private $descripcion;
private $Precio;
private $Categoria;
private $precio;
private $color;
private $descripcion;


    public function __construct($id,$marca,$modelo,$ano_fabricacion,$kilometraje,$precio,$color,$descripcion){
        $this->id = $id;

    }

    function __get($att){
        if(property_exists(__CLASS__,$att)){
            return $this->$att;
        }
    }

    function __set($att,$value){
        if(property_exists(__CLASS__,$att)){
            $this->$att = $value;
        }else{
            echo "No existe el atributo";
        }
    }
}

?>