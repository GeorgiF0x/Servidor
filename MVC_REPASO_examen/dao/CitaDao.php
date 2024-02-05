<?
class CitaDao
{

    public static function findAll()
    {
        $sql = "select * from Cita";
        $parametros = array();
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        $array_citas = array();
        while ($citaStd = $result->fetchObject()) {
            $cita = new Cita(
                $citaStd->id,
                $citaStd->especialista,
                $citaStd->motivo,
                $citaStd->fecha,
                $citaStd->activo,
                $citaStd->paciente
            );
            array_push($array_citas, $cita);

        }

        return $array_citas;
    }
    public static function findById($id)
    {
        $sql = "select * from Cita where id = ?";
        $parametros = array($id);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $citaStd = $result->fetchObject();
            $cita = new Cita(
                $citaStd->id,
                $citaStd->especialista,
                $citaStd->motivo,
                $citaStd->fecha,
                $citaStd->activo,
                $citaStd->paciente
            );
            return $cita;
        } else
            return null;


    }
    public static function findByPaciente($usuario)
    {
        $sql = "select * from Cita where paciente = ? and activo = 1 and fecha >now() order by fecha";
        $parametros = array($usuario->codUsuario);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        $array_citas = array();
        while ($citaStd = $result->fetchObject()) {
            $cita = new Cita(
                $citaStd->id,
                $citaStd->especialista,
                $citaStd->motivo,
                $citaStd->fecha,
                $citaStd->activo,
                $citaStd->paciente
            );
            array_push($array_citas, $cita);

        }

        return $array_citas;

    }
    public static function findByPacientePasadas($usuario)
    {
        $sql = "select * from Cita where paciente = ? and activo = 1 and fecha < now() order by fecha desc";
        $parametros = array($usuario->codUsuario);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        $array_citas = array();
        while ($citaStd = $result->fetchObject()) {
            $cita = new Cita(
                $citaStd->id,
                $citaStd->especialista,
                $citaStd->motivo,
                $citaStd->fecha,
                $citaStd->activo,
                $citaStd->paciente
            );
            array_push($array_citas, $cita);

        }

        return $array_citas;

    }
    public static function insert($cita)
    {
        $sql = "INSERT INTO Cita (id, especialista,motivo, fecha,activo,paciente)VALUES (?, ?, ?, ?, ?, ?)";
        //inserta todos los atributos
        // $parametros = array_values((array) $cita);
        // array_pop($parametros);
        // unset($parametros['User perfil']);
        $parametros = array(
            $cita->id,
            $cita->especialista,
            $cita->motivo,
            $cita->fecha,
            $cita->activo,
            $cita->paciente
        );
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        return true;
    }

    public static function update($cita)
    {
        $sql = "UPDATE Cita SET   especialista=?,motivo=?, fecha=?,activo=?,paciente=? WHERE id=?";
        $parametros = array(

            $cita->especialista,
            $cita->motivo,
            $cita->fecha,
            $cita->activo,
            $cita->paciente,
            $cita->id
        );
        // array_pop($parametros);
        // unset($parametros['User perfil']);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        return true;

    }
    public static function delete($cita)
    {
        $sql = "update Cita set activo = false where id=?";
        $parametros = array($cita->id);
        // array_pop($parametros);
        // unset($parametros['User perfil']);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;

    }
    public static function activa($cita)
    {
        $sql = "update Cita set activo = true where id=?";
        $parametros = array($cita->id);
        // array_pop($parametros);
        // unset($parametros['User perfil']);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;

    }
}