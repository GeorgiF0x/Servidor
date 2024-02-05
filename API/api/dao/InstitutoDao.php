<?
require('./models/Instituto.php');
require('./dao/FactoryBD.php');
class InstitutoDao
{

    public static function findAll()
    {
        $sql = "select * from institutos";
        $parametros = array();
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        $instStd = $result->fetchAll(PDO::FETCH_ASSOC);
        return $instStd;
    }
    public static function findById($id)
    {
        $sql = "select * from institutos where id = ?";
        $parametros = array($id);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $instStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $instStd;
        }

    }
    public static function findByFultros($filtros)
    {
        $parametros = [];
        $num = count($filtros);
        $sql = "select * from institutos where ";
        foreach ($filtros as $key => $value) {
            if ($key == 'nombre') {
                $sql .= $key . ' LIKE ?';
                $valor = '%' . $value . '%';
                array_push($parametros, $valor);
            } else {
                $sql .= $key . ' = ?';
                array_push($parametros, $value);
            }
            if ($num == 2) {
                $num--;
                $sql .= ' and ';
            }
        }
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        $instStd = $result->fetchAll(PDO::FETCH_ASSOC);
        return $instStd;
    }

    public static function insert($instituto)
    {
        $sql = 'insert into institutos values (null,?,?,?)';
        $parametros = array(
            $instituto->nombre,
            $instituto->localidad,
            $instituto->telefono
        );
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        return true;

    }

    public static function findLast()
    {
        $sql = "select * from institutos order by id desc limit 1";
        $parametros = array();
        $result = FactoryBD::realizarConsulta($sql, $parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update($instituto)
    {
        $sql = "UPDATE institutos SET nombre =?,localidad=?,telefono=? WHERE id =?";
        $parametros = array(
            $instituto->nombre,
            $instituto->localidad,
            $instituto->telefono,
            $instituto->id
        );
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        return true;

    }
    public static function delete($id)
    {
        $sql = "DELETE  from  institutos where id = ?";
        $parametros = array($id);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;
        else
            return false;
    }

    // public static function findByPacientePasadas($usuario)
    // {
    //     $sql = "select * from Cita where paciente = ? and activo = 1 and fecha < now() order by fecha desc";
    //     $parametros = array($usuario->codUsuario);
    //     $result = FactoryBd::realizarConsulta($sql, $parametros);
    //     $array_citas = array();
    //     while ($citaStd = $result->fetchObject()) {
    //         $cita = new Cita(
    //             $citaStd->id,
    //             $citaStd->especialista,
    //             $citaStd->motivo,
    //             $citaStd->fecha,
    //             $citaStd->activo,
    //             $citaStd->paciente
    //         );
    //         array_push($array_citas, $cita);

    //     }

    //     return $array_citas;

    // }
    // public static function insert($cita)
    // {
    //     $sql = "INSERT INTO Cita (id, especialista,motivo, fecha,activo,paciente)VALUES (?, ?, ?, ?, ?, ?)";
    //     //inserta todos los atributos
    //     // $parametros = array_values((array) $cita);
    //     // array_pop($parametros);
    //     // unset($parametros['User perfil']);
    //     $parametros = array(
    //         $cita->id,
    //         $cita->especialista,
    //         $cita->motivo,
    //         $cita->fecha,
    //         $cita->activo,
    //         $cita->paciente
    //     );
    //     $result = FactoryBd::realizarConsulta($sql, $parametros);
    //     return true;
    // }

    // public static function update($cita)
    // {
    //     $sql = "UPDATE Cita SET   especialista=?,motivo=?, fecha=?,activo=?,paciente=? WHERE id=?";
    //     $parametros = array(

    //         $cita->especialista,
    //         $cita->motivo,
    //         $cita->fecha,
    //         $cita->activo,
    //         $cita->paciente,
    //         $cita->id
    //     );
    //     // array_pop($parametros);
    //     // unset($parametros['User perfil']);
    //     $result = FactoryBd::realizarConsulta($sql, $parametros);
    //     return true;

    // }

    // public static function activa($cita)
    // {
    //     $sql = "update Cita set activo = true where id=?";
    //     $parametros = array($cita->id);
    //     // array_pop($parametros);
    //     // unset($parametros['User perfil']);
    //     $result = FactoryBd::realizarConsulta($sql, $parametros);
    //     if ($result->rowCount() > 0)
    //         return true;

    // }
}