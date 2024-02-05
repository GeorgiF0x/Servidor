<?
if (!validado()) {
    $_SESSION['vista'] = VIEW . 'login.php';
    $_SESSION['controller'] = CON . 'LoginController.php';
} else {
    if (isset($_REQUEST['PedirCita'])) {
        if ($_REQUEST['PedirCita'] == 'PedirCita') {
            $cita = new Cita(null, 'otorinolaringologo', 'Nauseas', '2024-01-30', true, $_SESSION['usuario']->codUsuario);
            if (CitaDao::insert($cita)) {

                $usuario = $_SESSION['usuario'];
                $array_cita = CitaDao::findByPaciente($usuario);
                $_SESSION['vista'] = VIEW . 'verCitas.php';
            }

        }
    } elseif (isset($_REQUEST['CitasAnteriores'])) {

        if ($_REQUEST['CitasAnteriores'] == 'CitasAnteriores') {
            $usuario = $_SESSION['usuario'];
            $array_cita = CitaDao::findByPacientePasadas($usuario);
            $_SESSION['vista'] = VIEW . 'verCitas.php';

        }
    } elseif (isset($_REQUEST['verTodo'])) {
        $array_cita = CitaDao::findAll();
        $_SESSION['vista'] = VIEW . 'verCitas.php';
    } elseif (isset($_REQUEST['Ver'])) {
        $array_cita = CitaDao::findById($_REQUEST['oculto']);
        $_SESSION['vista'] = VIEW . 'verCita.php';
    } else {
        $usuario = $_SESSION['usuario'];
        $array_cita = CitaDao::findByPaciente($usuario);
        $_SESSION['vista'] = VIEW . 'verCitas.php';

    }
}
