<?

class CitaDAO{

    public static function findAll(){
        $sql = "select * from cita";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        
        $array_citas = array();
        while($cita = $result->fetchObject()){
            $citaObject = new User($cita->Id,
                        $cita->Especialista,
                        $cita->motivo,
                        $cita->fecha,
                        $cita->paciente,
                        $cita->Activo);
            array_push($array_citas, $citaObject);
        }
    
        // return array con todos los User
        return $array_citas;
    }

    public static function findById($id){
        $sql = "select * from cita where Id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount()==1){
            $citastd  = $result->fetchObject();
            $cita= new Cita($citastd->Id,
                            $citastd->Especialista,
                            $citastd->motivo,
                            $citastd->fecha,
                            $citastd->paciente,
                            $citastd->Activo);
            return $cita;
        }
        //return 1 objeto cita
        else    
            return null;
    }

    // public static function insert($cita){
    //     $sql = "insert into cita (Id,Especialista,motivo,
    //      fecha,paciente,activo) values (?,?,?,?,?,?)";
    //     //insertar todos los atributos
    //     $parametros = array($cita->Id,
    //     $cita->Espacialista,
    //     $cita->motivo, 
    //     $cita->fecha,
    //     $cita->activo );
        
    //     $result = FactoryBD::realizaConsulta($sql,$parametros);
    //     return true;
    // }
    
    
    public static function insert($cita)
    {
        $sql = "INSERT INTO cita (Especialista, motivo, fecha, paciente, Activo) VALUES (?,?,?,?,?)";
        //insertar todos los atributos
        $parametros = array(
            $cita->Especialista,
            $cita->motivo,
            $cita->fecha,
            $cita->Activo,
            $cita->paciente
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($cita){
        $sql = "UPDATE cita set
        Especialista = ?, motivo = ? , 
        fecha = ? , paciente = ?
        where Id = ?";
        //insertar todos los atributos
        $parametros = array(
            $cita->Especialista, 
            $cita->motivo,
            $cita->fecha,
            $cita->paciente,
            $cita->Id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
        return false;
    }

    public static function findByPaciente($usuario){
        $sql= "select * from cita where paciente = ? order by fecha";
        $parametros= array($usuario->codUsuario);
        $result=FactoryBD::realizaConsulta($sql,$parametros);
        $array_citas=array();
        while($citaStd= $result->fetchObject()){
            $cita = new Cita($citaStd->Id,
                                $citaStd->Especialista,
                                $citaStd->motivo,
                                $citaStd->fecha,
                                $citaStd->paciente,
                                $citaStd->Activo);   
                                array_push($array_citas,$cita);
        }
            return $array_citas;
    }
}