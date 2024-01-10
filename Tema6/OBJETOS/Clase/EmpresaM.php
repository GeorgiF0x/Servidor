<?
    class EmpresaM
    {
        private $cif;
        private $nombre;
        private $localidad;

        function __construct($cif,$nombre,$localidad){
            $this->$cif=$cif;
            $this->$nombre=$nombre;
            $this->$localidad=$localidad;
        }
        static function saluda(){
            self::saluda1();
            echo "hola soy empresa" ;
        }
        static function saluda1(){
            echo "hola soy empresa1" ;
        }
        public function __get($att){
            return $this->$att;
        }
      
        public function __set($att,$valor){
            if(property_exists(__CLASS__,$att)){
                 $this->$att=$valor;
            }else{
                echo "propiedad no existente en el objeto ". __CLASS__;
            }
        }

        public function toString(){
            return $this->cif.":".$this->nombre.":".$this->localidad.":";
        }

    }