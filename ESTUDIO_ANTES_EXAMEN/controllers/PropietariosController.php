<?php
//para que se cree la tabla actualizada
unset($_SESSION['coches']);


// Comprobar si el usuario está autenticado antes de acceder a sus datos
if(isset($_SESSION['usuario'])) {
    // Mostrar los datos de los coches solo si el usuario está autenticado
    $_SESSION['coches'] = CochesDao::getByPropietario($_SESSION['usuario']->id);
}

if(isset($_REQUEST['eliminarCoche'])){
    CochesDao::delete($_REQUEST['cocheId']);
    $_SESSION['coches'] = CochesDao::getByPropietario($_SESSION['usuario']->id);
}

if(isset($_REQUEST['addCoche'])){
    $_SESSION['controlador'] = CON . 'addCocheController.php';
    require $_SESSION['controlador'];
}else if(isset($_REQUEST['verMatriculas'])){
    $_SESSION['controlador'] = CON.'matriculasController.php';
    $_SESSION['vista'] = VIEW.'matriculasView.php';
    require $_SESSION['controlador'];
}
?>









