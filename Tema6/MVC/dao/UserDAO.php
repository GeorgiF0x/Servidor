<?

    class UserDAO{
        public static function  findAll(){
            $sql = "SELECT * FROM Usuario";
            $parametros = array();
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            $array_usuarios = array();
            while($usuarioStd = $result->fetchObject()){
                $usuario= new User($usuarioStd->codUsuario,$usuarioStd->password,$usuarioStd->descUsuario,$usuarioStd->fechaUltimaConexion,$usuarioStd->perfil);
                array_push($array_usuarios,$usuario);
                echo "<pre>";
                print_r($array_usuarios);
            }
        }

        public static function findByID($idUser){
            $sql = "SELECT * FROM Usuario WHERE codUsuario = ?";
            $parametros = array($idUser); // Add $idUser to the parameters array
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            $array_usuarios = array();
            
            if($result->rowCount() == 1){
                $usuarioStd = $result->fetchObject();
                $usuario = new User($usuarioStd->codUsuario, $usuarioStd->password, $usuarioStd->descUsuario, $usuarioStd->fechaUltimaConexion, $usuarioStd->perfil);
                print_r($usuario);
                return $usuario;
            } else {
                return null;
            }
        }
        

        public static function insert($usuario){
            $sql="insert into Usuario values(codUsuario,password,descUsuario,fechaUltimaConexion) values (?,?,?,?)";
            //para todos los atributos
            $parametros= (array)$usuario;
            unset($parametros['User perfil']);
            $result= FactoryBD::realizaConsulta($sql,$parametros);
            return true;
        }
    }


