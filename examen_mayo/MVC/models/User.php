<?php

class User{
private $id;
private $nombre;
private $password;
private $perfil;



    public function __construct($id,$nombre,$password){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->perfil = "user"; //por defecto user no admin
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