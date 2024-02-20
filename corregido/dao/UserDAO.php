<?

class UserDAO{
    public static function findAll(){
        $sql = "select * from usuarios";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);

        $array_usuarios = array();
        while ($usuarioStd = $result->fetchObject()) {  //$codUsuario,$password,$descUsuario,$fechaUltimaConexion,$perfil,$activo
            $usuario = new User(
                $usuarioStd->id_usuario,
                $usuarioStd->username,
                $usuarioStd->password,
                $usuarioStd->tipo
            );
            array_push($array_usuarios,$usuario);
        }

        //return array con todos los User
        return $array_usuarios;
    }

    public static function findById($id){
        //return 1 objeto usuario
        $sql = "select * from usuarios where id_usuario = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        
        if($result->rowCount()==1){
            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->id_usuario,
                $usuarioStd->username,
                $usuarioStd->password,
                $usuarioStd->tipo
            );
            return $usuario;
        } else {
            return null;
        }
    }

    //findByDescUsuario
    public static function buscarPorNombre($nombre){
        //return 1 objeto usuario
        $sql = "select * from usuarios where username like ?";
        $nombre = '%'.$nombre.'%';
        $parametros = array($nombre);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        
        if($result->rowCount()==1){
            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->id_usuario,
                $usuarioStd->username,
                $usuarioStd->password,
                $usuarioStd->tipo
            );
            return $usuario;
        } else {
            return null;
        }
    }

    public static function validarUsuario($nombre, $password){
        $sql = "select * from usuarios where username = ? and password = ?";
        $password = sha1($password);
        $parametros = array($nombre,$password);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount()==1){
            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->id_usuario,
                $usuarioStd->username,
                $usuarioStd->password,
                $usuarioStd->tipo
            );
            // echo "LOGIN CORRECTO<br>";
            return $usuario;
        } else {
            echo "Login incorrecto";
            return null;
        }
    }
}