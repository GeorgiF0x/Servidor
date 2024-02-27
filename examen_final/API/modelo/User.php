<?php

class User{
    private $id;
    private $user;
    private $token;
    private $caduca;



    public function __construct($id,$user,$token,$caduca){
        $this->id = $id;
        $this->user=$user;
        $this->token=$token;
        $this->cadura=$caduca;
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