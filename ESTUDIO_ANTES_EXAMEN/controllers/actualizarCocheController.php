<?
    $errores = array();
    $_SESSION['Coche']=CochesDao::getById($_REQUEST['cocheId']);
    // print_r($_SESSION['Coche']);

    if(validarInsert($errores)&& isset($_REQUEST['actualizar'])){
        $marca=$_REQUEST['marca'];
        $modelo=$_REQUEST['modelo'];
        $anio=$_REQUEST['anio'];
        $color=$_REQUEST['color'];
        $precio=$_REQUEST['precio'];
        $idPropietario=$_SESSION['usuario']->id;
        $CocheUpt=$_SESSION['Coche'];
        $CocheUpt->marca=$_REQUEST['marca'];
        $CocheUpt->modelo=$_REQUEST['modelo'];
        $CocheUpt->anio=$_REQUEST['anio'];
        $CocheUpt->color=$_REQUEST['color'];
        $CocheUpt->precio=$_REQUEST['precio'];
        if(CochesDao::update($cocheUpt)){
            $_SESSION['avisos']['cocheUpdate']='Coche actualizado';
            $_SESSION['coches'] = CochesDao::getByPropietario($_SESSION['usuario']->id);
            $_SESSION['controlador'] = CON . 'PropietariosController.php';
            $_SESSION['vista'] = VIEW . 'homePropietarios.php';
        }else{
            $errores['updateCoche']='Error al actualizar coche';
        }
    }