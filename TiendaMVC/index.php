<?php
require_once('./config/config.php');
session_start();

// // Limpiar variables de sesión antes de asignar nuevos valores
// unset($_SESSION['vista']);
// unset($_SESSION['controller']);

if(isset($_REQUEST['login']))
{
    $_SESSION['vista'] = VIEW.'login.php';
    $_SESSION['controller'] = CON.'loginController.php';
}

elseif(isset($_REQUEST['home']))
{
    $_SESSION['vista'] = VIEW.'home.php';
}

elseif(isset($_REQUEST['logout'])){
    session_destroy();
    header('Location: ./index.php');
}

elseif(isset($_REQUEST['User_verPerfil'])){
    $_SESSION['vista'] = VIEW.'verUsuario.php';
    $_SESSION['controller'] = CON.'UserController.php';
}

elseif(isset($_REQUEST['Pedidos_ver'])){
    $_SESSION['vista'] = VIEW.'verPedidos.php';
    $_SESSION['controller'] = CON.'pedidosController.php';
}


if(isset($_SESSION['controller']))
    require($_SESSION['controller']);

require('./views/layout.php');

