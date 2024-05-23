<?php

class Partido{
private $id;
private $jug1;
private $jug2;
private $fecha;
private $resultado;



    public function __construct($id,$jug1,$jug2,$fecha,$resultado){
        $this->id = $id;
        $this->jug1 = $jug1;
        $this->jug2 = $jug2;
        $this->fecha = $fecha;
        $this->resultado = $resultado;
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