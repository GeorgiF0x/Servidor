<?
require('./config/confi.php');

session_start();
if (isset($_REQUEST['loginLay'])) {
    $_SESSION['vista'] = VIEW . 'login.php';
    $_SESSION['controller'] = CON . 'LoginController.php';
} elseif (isset($_REQUEST['home'])) {
    $_SESSION['vista'] = VIEW . 'home.php';
} elseif (isset($_REQUEST['cerrar'])) {
    session_destroy();
    header('Location: ./index.php');
} elseif (isset($_REQUEST['verperfil'])) {
    $_SESSION['vista'] = VIEW . 'verUsuario.php';
    $_SESSION['controller'] = CON . 'UserController.php';

} elseif (isset($_REQUEST['registrar'])) {
    $_SESSION['controller'] = CON . 'LoginController.php';
    $_SESSION['vista'] = VIEW . 'registro.php';
} elseif (isset($_REQUEST['vercitas'])) {
    $_SESSION['vista'] = VIEW . 'verCitas.php';
    $_SESSION['controller'] = CON . 'CitasController.php';

} elseif (isset($_REQUEST['verTodo'])) {
    $_SESSION['vista'] = VIEW . 'verCitas.php';
    $_SESSION['controller'] = CON . 'CitasController.php';

}
if (isset($_SESSION['controller'])) {
    require($_SESSION['controller']);
}

require('./views/layout.php');
// echo '<pre>';
// print_r(
//     UserDao::findAll()
// );
// print_r(
//     UserDao::findById('3')
// );
//  $usuario = new User('1', sha1('luis'), 'luis', '2024-01-11', 'usuario', true);
// UserDao::update($usuario);
// $usuario = new User(30, sha1('admin'), 'admin', '2024-01-11', 'administrador', true);
// UserDao::insert($usuario);
// // $usuario = new User('5', sha1('juana la loca 1'), 'juana la loca 1', '2024-01-11', 'usuario', true);
// // UserDao::delete($usuario);
// print_r(UserDao::buscarPorNombre('lu'));
// print_r(UserDao::validarUsuario('luis','luis'));
// print_r(
//     CitaDao::findAll()
// );
// print_r(
//     CitaDao::findById('2')
// );

// $cita = new Cita(7, 'dermatologo', 'smail', '2024-01-11', true, '1');
// CitaDao::insert($cita);
// $cita = new Cita(6, 'dermatologo', 'smail', '2024-01-11', true, '1');
// CitaDao::insert($cita);
// $cita = new Cita(6, 'dermatologo', 'dolor de muelas', '2024-01-11', true, '1');
// CitaDao::update($cita);
// CitaDao::activa($cita);
// print_r(
// CitaDao::findByPacientePasadas($usuario)
// );
