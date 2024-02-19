<?
class UserDao
{

    public static function findAll()
    {
        $sql = "select * from usuarios";
        $parametros = array();
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        $array_usuarios = array();
        while ($usuarioStd = $result->fetchObject()) {
            $usuario = new User(
                $usuarioStd->id_usuario,
                $usuarioStd->username,
                $usuarioStd->password,
                $usuarioStd->tipo
            );
            array_push($array_usuarios, $usuario);
        }
        return $array_usuarios;
    }
    public static function findById($id)
    {
        $sql = "select * from usuarios where id_usuario = ?";
        $parametros = array($id);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->id_usuario,
                $usuarioStd->username,
                $usuarioStd->password,
                $usuarioStd->tipo
            );
            return $usuario;
        } else
            return null;


    }
    public static function insert($usuario)
    {
        $sql = "INSERT INTO usuarios (id_usuario,username,password,tipo)VALUES (?, ?, ?, ?)";
        //inserta todos los atributos
        // $parametros = array_values((array) $usuario);
        // array_pop($parametros);
        // unset($parametros['User perfil']);
        $parametros = array(
            $usuario->id_usuario,
            $usuario->username,
            sha1($usuario->password),
            $usuario->tipo,
        );
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        return true;
    }




    public static function validarUsuario($nombre, $contra)
    {
        //return 1 objeto usuario
        $sql = "select * from usuarios where username = ? and password= ?";
        $parametros = array($nombre, sha1($contra));
        $result = FactoryBD::realizarConsulta($sql, $parametros);

        if ($result->rowCount() == 1) {
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



}