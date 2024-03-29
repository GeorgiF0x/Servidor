<?php

    class User {
        private $codUsuario;
        private $password;
        private $descUsuario;
        private $fechaUltimaConexion;
        private $perfil;
        private $activo;

        function __construct($codUsuario,$password,$descUsuario,$fechaUltimaConexion,$perfil="usuario",$activo=true)
        {
            $this-> codUsuario=$codUsuario;
            $this-> password=$password;
            $this-> descUsuario=$descUsuario;
            $this-> fechaUltimaConexion=$fechaUltimaConexion;
            $this-> perfil=$perfil;
            $this->activo=$activo;
        }

        public function __get($att){
            if(property_exists(__CLASS__,$att))
            return $this->$att;
        }
      
        public function __set($att,$valor){
            if(property_exists(__CLASS__,$att)){
                 $this->$att=$valor;
            }else{
                echo "propiedad no existente en el objeto ". __CLASS__;
            }
        }
    }