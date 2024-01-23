<?

if(isset($_REQUEST['add_cita'])){
        $_SESSION['vista']=VIEW."pedirCita.php";
        $errores=array();
        if(validarNuevaCita($errores)){
            $cita = new Cita(null,$_REQUEST['especialista'], $_REQUEST['motivo'], $_REQUEST['fecha'],true, $_SESSION['usuario']->codUsuario);
            if (!CitaDAO::insert($cita)) {
                $errores['insertar']="No se ha podido generar la cita";
            }else{
                $sms="se ha guardado la cita";
                $array_citas = CitaDAO::findByPaciente($_SESSION['usuario']);
                $_SESSION['vista']=VIEW."verCitas.php";
                
            }
        }
}elseif(isset($_REQUEST['cita_anterior'])){
    $array_citas=CitaDAO::findById($_SESSION['usuario']->codUsuario);
}
elseif(isset($_REQUEST['ver_cita_paciente'])){
    $errores=array();
    if(validarVerCitaAdmin($errores)){
        $array_citas=CitaDAO::findById($_REQUEST['cod_paciente']);
    }
}
else{
    $array_citas = CitaDAO::findByPaciente($_SESSION['usuario']);
    $_SESSION['vista']=VIEW."verCitas.php";
}