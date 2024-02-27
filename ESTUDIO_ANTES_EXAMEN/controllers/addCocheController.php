<?php
$errores = array();
$_SESSION['vista'] = VIEW . 'addCoche.php';
var_dump($_REQUEST['insertarCoche']);


if(isset($_REQUEST['insertarCoche'])&& validarFomInsertCoche($errores)){
    $marca=$_REQUEST['marca'];
    $modelo=$_REQUEST['modelo'];
    $anio=$_REQUEST['anio'];
    $color=$_REQUEST['color'];
    $precio=$_REQUEST['precio'];
    $idPropietario=$_SESSION['usuario']->id;
    $nuevoCoche= new Coche(null,$marca,$modelo,$anio,$color,$precio,$idPropietario);
    // $nuevoCoche= new Coche(null,'pruebaInsert','MODELOprueba2223',2020,'ROJO',1000000,2,1,'prueba');
    if(CochesDao::insert($nuevoCoche)){
        $_SESSION['avisos']['cocheInsert']='Coche insertado';
    }else{
        $errores['insertCoche']='Error al insertar coche';
    }
}


?>









    