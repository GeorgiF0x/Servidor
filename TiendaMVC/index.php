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



echo "<pre>";
// print_r(CitaDAO::findAll()); 
// $cita=CitaDAO::findById('2');
// print_r($cita);


// $cita=CitaDAO::findById('6');
// $cita->Especialista="Dr canijo";
// CitaDAO::update($cita);
// $citaActualizada=CitaDAO::findById('6');
// print_r($citaActualizada);

// $usuario=UserDAO::findById('user2');
// CitaDAO::findByPaciente($usuario);




// $usuarioBusca = UserDAO::findById('3');
// print_r(UserDAO::findById('7'));
// $usuario = new User('3',sha1('lucia'),'lucia','2024-01-11','usuario');
// UserDAO::insert($usuario);

// //update
// // print_r(UserDAO::findAll()); lo comento para que no muestre la tabla cada vez
// $usuario = UserDAO::findById('3');
// $usuario->descUsuario = 'Ana';
// UserDAO::update($usuario);
// // print_r(UserDAO::findAll());

// //delete
// print_r(UserDAO::findAll());
// $usuario = UserDAO::findById('6');
// UserDAO::delete($usuario);
// // print_r(UserDAO::findAll());

// //buscar por nombre
// $usuario = UserDAO::buscarPorNombre('na');
// echo "Busqueda de usuario por nombre: ";
// print_r($usuario);

// //validar el usuario
// $usuario = UserDAO::validarUser('alvaro','alvaro');
// print_r($usuario);
