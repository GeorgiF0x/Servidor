<?php

require('./config/config.php');
// session_start();

// if(isset($_REQUEST['login']))
// {
//     $_SESSION['vista'] = VIEW.'login.php';
//     $_SESSION['controller'] = CON.'loginController.php';
// }elseif(isset($_REQUEST['home']))
// {
//     $_SESSION['vista'] = VIEW.'home.php';
// }elseif(isset($_REQUEST['logout'])){
//     session_destroy();
//     header('Location: ./index.php');
// }elseif(isset($_REQUEST['User_verPerfil'])){
//     $_SESSION['vista'] = VIEW.'verUsuario.php';
//     $_SESSION['controller'] = CON.'UserController.php';
// }
// elseif(isset($_REQUEST['Citas_ver'])){
//     $_SESSION['vista'] = VIEW.'verCitas.php';
//     $_SESSION['controller'] = CON.'citasController.php';
// }


// if(isset($_SESSION['controller']))
//     require($_SESSION['controller']);
// require('./views/layout.php');



echo "<pre>";
// print_r(UserDAO::findAll()); 
// $cita=UserDAO::findById('2');
// print_r($cita);
//  $user=UserDao::findById('3');
//  $user->Nombre="User";
//  UserDAO::update($user);
//  $user=UserDao::findById('3');
//  print_r($user);

// $user=UserDao::findById('3');
// $user->Contraseña="georgi";
// UserDAO::cambioContraseña($user);
// $user=UserDao::findById('3');
// print_r($user);
// $usuario = new User('4','Prueba','Prueba','prueba@example.com','2024-01-11','Cliente',0);
// UserDAO::insert($usuario);
$user=UserDao::findById('4');
UserDAO::delete($user);
$user=UserDao::findById('4');
print_r($user);





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


