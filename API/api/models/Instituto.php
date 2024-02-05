    <?php
    
    class Instituto{
        private $id;
        private $nombre;
        private $localidad;
        private $telefono;
    
        public function __construct($id, $nombre, $localidad, $telefono) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->localidad = $localidad;
            $this->telefono = $telefono;
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
                echo 'No existe "' . $att . '"';
            }
        }
    }