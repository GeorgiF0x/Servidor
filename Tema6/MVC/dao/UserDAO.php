<?

    class UserDAO{
        
        public static function  findAll(){
            $sql = "SELECT * FROM Usuario";
            $parametros = array();
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            $array_usuarios = array();
            while($usuarioStd = $result->fetchObject()){
                $usuario= new User($usuarioStd->codUsuario,$usuarioStd->password,$usuarioStd->descUsuario,$usuarioStd->fechaUltimaConexion,$usuarioStd->perfil,$usuarioStd->activo);
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
                $usuario = new User($usuarioStd->codUsuario, $usuarioStd->password, $usuarioStd->descUsuario, $usuarioStd->fechaUltimaConexion, $usuarioStd->perfil,$usuarioStd->activo);
                // echo "<pre>";
                // print_r($usuario);
                return $usuario;
            } else {
                return null;
            }
        }
        

        public static function insert($usuario){
            $sql="insert into Usuario (codUsuario,password,descUsuario,fechaUltimaConexion,activo) values (?,?,?,?,?)";
            //para todos los atributos
            $parametros = array(
                $usuario -> codUsuario,
                sha1($usuario -> password),
                $usuario -> descUsuario,
                $usuario -> fechaUltimaConexion, 
                $usuario->activo
            );
            $result= FactoryBD::realizaConsulta($sql,$parametros);
            if($result){
                return true;
            }else{
                return false;
            }
        }


        public static function update($usuario){
            $sql="update Usuario set descUsuario=?,fechaUltimaConexion=?,perfil=? ,activo=? where codUsuario = ?";
         
            $parametros = array(
                $usuario -> descUsuario,
                $usuario -> fechaUltimaConexion, 
                $usuario -> perfil,
                $usuario->activo,
                $usuario -> codUsuario
            );
            $result= FactoryBD::realizaConsulta($sql,$parametros);
            if($result){
                return true;
            }
        }

        public static function UpdatePass($usuario){
            $sql="update Usuario set password=?,descUsuario=?,fechaUltimaConexion=?,perfil=? ,activo=? where codUsuario = ?";
            $parametros = array(
                $usuario->password,
                $usuario -> descUsuario,
                $usuario -> fechaUltimaConexion, 
                $usuario -> perfil,
                $usuario->activo,
                $usuario -> codUsuario
            );
            $result= FactoryBD::realizaConsulta($sql,$parametros);
            if($result){
                return true;
            }
        }

        public static function delete($usuario){
            $sql="update Usuario set activo = false where codUsuario=?";
            $parametros=array($usuario->codUsuario);
            $result= FactoryBD::realizaConsulta($sql,$parametros);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public static function findByName($name){
            $sql = "SELECT * FROM Usuario WHERE nombre = ?";
            $name="%.$name.%";
            $parametros = array($name); 
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            $array_usuarios = array();
            
            if($result->rowCount() == 1){
                $usuarioStd = $result->fetchObject();
                $usuario = new User($usuarioStd->codUsuario, $usuarioStd->password, $usuarioStd->descUsuario, $usuarioStd->fechaUltimaConexion, $usuarioStd->perfil,$usuarioStd->activo);
                // echo "<pre>";
                // print_r($usuario);
                return $usuario;
            } else {
                return null;
            }
        }

        public static function validarUser($codUsuario, $password) {
            $sql = "SELECT * FROM Usuario WHERE codUsuario = ? AND password = ? AND activo = true";
            $parametros = array($codUsuario, $password);
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            if ($result->rowCount() == 1) {
                $usuario = $result->fetchObject();
                $usuario = new User(
                    $usuario->codUsuario,
                    $usuario->password,
                    $usuario->descUsuario,
                    $usuario->fechaUltimaConexion,
                    $usuario->perfil,
                    $usuario->activo
                );
                return $usuario;
            } else {
                return null;
            }
        }
    }


