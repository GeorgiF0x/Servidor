<?
class UserDao
{

    public static function findAll(){
        $sql = "select * from usuarios";
        $parametros = array();
        $result = FactoryBd::realizarConsulta($sql,$parametros);
        $arrayUsuarios = array();
        while ($Usuariostd = $result->fetchObject()) {
            $usuario = new User(
                $Usuariostd->id,
                $Usuariostd->nombre,
                $Usuariostd->password,
                $Usuariostd->perfil
            );
            array_push($arrayUsuarios, $usuario);
        }
        return $arrayUsuarios;
    }

    public static function findById($id){
        $sql = "select * from usuarios where id = ?";
        $parametros = array($id);
        $result = FactoryBd::realizarConsulta($sql,$parametros);
        $Usuariostd = $result->fetchObject();
        $usuario = new User(
            $Usuariostd->id,
            $Usuariostd->nombre,
            $Usuariostd->password,
            $Usuariostd->perfil
        );
        return $usuario;
    }

    public static function validarUser($nombre, $contraseña) {
        // $contraseña = sha1($contraseña);
        $sql = "SELECT * FROM usuarios WHERE nombre = ? AND password = ?";
        $parametros = array($nombre, $contraseña);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
    
        if ($result->rowCount() == 1) {
            $usuarioStd = $result->fetch(PDO::FETCH_ASSOC); 
            return $usuarioStd; 
        } else {
            return null; 
        }
    }
    



}