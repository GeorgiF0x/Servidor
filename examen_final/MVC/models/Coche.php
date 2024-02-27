<?php

class Coche{
private $id;
private $marca;
private $modelo;
private $ano_fabricacion;
private $kilometraje;
private $precio;
private $color;
private $descripcion;


    public function __construct($id,$marca,$modelo,$ano_fabricacion,$kilometraje,$precio,$color,$descripcion){
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo=$modelo;
        $this->ano_fabricacion=$ano_fabricacion;
        $this->kilometraje=$kilometraje;
        $this->precio=$precio;
        $this->color=$color;
        $this->descripcion=$descripcion;
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