<?
require('./config/confi.php');
session_start();

if(isset($_REQUEST['login']))
{
    require CON.'LoginController.php';
}
if(isset($_REQUEST['home']))
{
    $_SESSION['vista'] = VIEW .'homePropietarios.php';
    $_SESSION['controlador'] = CON .'PropietariosController.php';
}
else if(!isset($_SESSION['usuario'])){
    $_SESSION['vista'] = VIEW .'login.php';
}
else if(isset($_REQUEST['Login_CerrarSesion'])){
    session_destroy();
    header('Location: ./index.php');
    exit;
}else{
    require $_SESSION['controlador'];
}


require VIEW.'layout.php';




//***************Pruebas de dao*******
// $nuevoCoche= new Coche(null,'pruebaInsert','MODELOprueba',2020,'ROJO',1000000,2,1,'prueba');
// CochesDao::insert($nuevoCoche);
// echo "hoal";
// $nuevoCoche= new Coche(null,'prueba','prueba',2020,'prueba',1000,1,'prueba',1);
// CochesDao::insert($nuevoCoche);
// $cochesJuan= CochesDao::getByPropietario(1);
// echo '<pre>';
// print_r($cochesJuan);
// $coches= CochesDao::findAll();
// echo '<pre>';
//  print_r(PropietariosDao::findByName('a'));
// $propietario3=PropietariosDao::findById(3);
// $propietario3->nombre='prueba';
// PropietariosDao::update($propietario3);
// print_r(PropietariosDao::findById(3));
// $propietarioPrueba= new Propietario(null,'prueba','prueba','prueba','prueba','prueba');
// PropietariosDao::insert($propietarioPrueba);
// print_r(PropietariosDao::delete(6));
// print_r(PropietariosDao::findById(4));
// print_r(PropietariosDao::findAll());
// print_r($coches);
// print_r( CochesDao::getById(5));
// $pruebaInsert= new Coche(null,'prueba','prueba',2020,'prueba',1000,1,'prueba');
// if(CochesDao::insert($pruebaInsert)){
//     echo 'Insertado';
// }
// if(CochesDao::delete(6)){
//     echo 'Borrado';
// }
