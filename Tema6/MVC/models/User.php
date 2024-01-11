<?php

    class User {
        private $codigoUsuario;
        private $password;
        private $descUsuario;
        private $numAccesos;        private $fechaUltimaConexion;
        private $perfil;

        function __construct($codigoUsuario,$password,$descUsuario,$fechaUltimaConexion,$perfil)
        {
            $this-> codigoUsuario=$codigoUsuario;
            $this-> password=$password;
            $this-> descUsuario=$descUsuario;
            $this-> fechaUltimaConexion=$fechaUltimaConexion;
            $this-> perfil=$perfil;
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