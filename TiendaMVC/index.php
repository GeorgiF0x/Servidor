<?php

require('./config/config.php');
session_start();

if(isset($_REQUEST['login']))
{
    $_SESSION['vista'] = VIEW.'login.php';
    $_SESSION['controller'] = CON.'loginController.php';
}elseif(isset($_REQUEST['home']))
{
    $_SESSION['vista'] = VIEW.'home.php';
}elseif(isset($_REQUEST['logout'])){
    session_destroy();
    header('Location: ./index.php');
}elseif(isset($_REQUEST['User_verPerfil'])){
    $_SESSION['vista'] = VIEW.'verUsuario.php';
    $_SESSION['controller'] = CON.'UserController.php';
}
elseif(isset($_REQUEST['Citas_ver'])){
    $_SESSION['vista'] = VIEW.'verCitas.php';
    $_SESSION['controller'] = CON.'citasController.php';
}


if(isset($_SESSION['controller']))
    require($_SESSION['controller']);
require('./views/layout.php');
