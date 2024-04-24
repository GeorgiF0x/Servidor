<?php
// Se incluyen los archivos necesarios
require("./controlador/Base.php");
require('./controlador/UserController.php');
require('./controlador/ProductoController.php');
require('./controlador/CarritoController.php');



// require_once('./dao/ProductoDAO.php');
// $producto=ProductoDAO::findById(6);
// echo "<pre>";
// $producto[0]['Descripcion']="JAJAJA";
// print_r($producto);

// ProductoDAO::update($producto);
// $productoPrueba=ProductoDAO::findById(6);











// Se verifica si se ha especificado la información de la ruta en la solicitud
if(isset($_SERVER['PATH_INFO'])){
    // Se obtiene la información de la ruta y se divide en segmentos
    $recurso = Base::divideURI();
   
    if($recurso[1] === 'usuarios'){
        UserController::usuarios();
    }
    elseif ($recurso[1]==="productos") {
        ProductoController::productos();
    }elseif($recurso[1]==="carrito"){
        CarritoController::carrito();
    }

    
} else {
    // Si no se ha especificado la información de la ruta, se devuelve un error 400
    Base::response("HTTP/1.0 400 Direccion incorrecta, no se ha especificado el recurso");
}
?>
