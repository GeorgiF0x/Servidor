<?php

require("./config/config.php");
session_start();

if(isset($_REQUEST['login'])){
    $_SESSION['vista'] = VIEW.'login.php';
    $_SESSION['controller'] = CON."loginController.php";
}elseif(isset($_REQUEST['Home'])){
    $_SESSION['vista'] = VIEW.'home.php';
}elseif(isset($_REQUEST['cerrarSesion'])){
    session_destroy();
    header('Location: ./index.php');
}elseif(isset($_REQUEST['verPerfil'])){
    $_SESSION['vista'] = VIEW.'verUsuario.php';
    $_SESSION['controller'] = CON."userController.php";
}elseif(isset($_REQUEST['verCitas'])){
    $_SESSION['vista'] = VIEW.'verCitas.php';
    $_SESSION['controller'] = CON.'citaController.php';
}elseif(isset($_REQUEST['pedirCita'])){
    $_SESSION['controller'] = CON.'citaController.php';
}elseif(isset($_REQUEST['verTodasCitas'])){
    $_SESSION['vista'] = VIEW.'verCitas.php';
    $_SESSION['controller'] = CON.'citaController.php';
}
if(isset($_SESSION['controller']))
    require($_SESSION['controller']);
require("./views/layout.php");



?>