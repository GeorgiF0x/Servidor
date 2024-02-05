<?
class UserDao
{

    public static function findAll()
    {
        $sql = "select * from Usuario";
        $parametros = array();
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        $array_usuarios = array();
        while ($usuarioStd = $result->fetchObject()) {
            $usuario = new User(
                $usuarioStd->codUsuario,
                $usuarioStd->password,
                $usuarioStd->descUsuario,
                $usuarioStd->perfil,
                $usuarioStd->fechaUltimaConexion,
                $usuarioStd->activo

            );
            array_push($array_usuarios, $usuario);

        }

        return $array_usuarios;
    }
    public static function findById($id)
    {
        $sql = "select * from Usuario where codUsuario = ?";
        $parametros = array($id);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->codUsuario,
                $usuarioStd->password,
                $usuarioStd->descUsuario,
                $usuarioStd->perfil,
                $usuarioStd->fechaUltimaConexion,
                $usuarioStd->activo

            );
            return $usuario;
        } else
            return null;


    }
    public static function insert($usuario)
    {
        $sql = "INSERT INTO Usuario (codUsuario, password,descUsuario, fechaUltimaConexion,perfil,activo)VALUES (?, ?, ?, ?, ?, ?)";
        //inserta todos los atributos
        // $parametros = array_values((array) $usuario);
        // array_pop($parametros);
        // unset($parametros['User perfil']);
        $parametros = array(
            $usuario->codUsuario,
            $usuario->password,
            $usuario->descUsuario,
            $usuario->fechaUltimaConexion,
            $usuario->perfil,
            $usuario->activo
        );
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        return true;
    }
    public static function update($usuario)
    {
        $sql = "UPDATE Usuario SET  password=?,descUsuario=?, fechaUltimaConexion=? ,perfil=?,activo=? WHERE codUsuario=?";
        $parametros = array(
            $usuario->password,
            $usuario->descUsuario,
            $usuario->fechaUltimaConexion,
            $usuario->perfil,
            $usuario->activo,
            $usuario->codUsuario


        );
        // array_pop($parametros);
        // unset($parametros['User perfil']);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        return true;

    }
    public static function delete($usuario)
    {
        $sql = "update Usuario set activo = false where codUsuario=?";
        $parametros = array($usuario->codUsuario);
        // array_pop($parametros);
        // unset($parametros['User perfil']);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;

    }
    public static function activa($usuario)
    {
        $sql = "update Usuario set activo = true where codUsuario=?";
        $parametros = array($usuario->codUsuario);
        // array_pop($parametros);
        // unset($parametros['User perfil']);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;

    }
    public static function buscarPorNombre($nombre)
    {
        //return 1 objeto usuario
        $sql = "select * from Usuario where descUsuario like ?";
        $nombre = '%' . $nombre . '%';
        $parametros = array($nombre);
        $result = FactoryBD::realizarConsulta($sql, $parametros);

        if ($result->rowCount() == 1) {
            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->codUsuario,
                $usuarioStd->password,
                $usuarioStd->descUsuario,
                $usuarioStd->fechaUltimaConexion,
                $usuarioStd->perfil,
                $usuarioStd->activo
            );
            return $usuario;
        } else {
            return null;
        }
    }
    public static function validarUsuario($nombre, $contra)
    {
        //return 1 objeto usuario
        $sql = "select * from Usuario where descUsuario = ? and password= ? and activo = true";
        $parametros = array($nombre, sha1($contra));
        $result = FactoryBD::realizarConsulta($sql, $parametros);

        if ($result->rowCount() == 1) {
            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->codUsuario,
                $usuarioStd->password,
                $usuarioStd->descUsuario,
                $usuarioStd->fechaUltimaConexion,
                $usuarioStd->perfil,
                $usuarioStd->activo
            );
            return $usuario;
        } else {
            return null;
        }
    }



}