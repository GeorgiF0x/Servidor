<?php
// Se incluyen los archivos necesarios
require("./controlador/Base.php");
require('./controlador/UserController.php');
require('./controlador/ProductoController.php');
require('./controlador/CarritoController.php');
require('./controlador/CategoriaController.php');


// require_once('./dao/UserDAO.php');
// $nombre="Georgi";
// $pass="userpass";




// $producto=ProductoDAO::findById(6);
// echo "<pre>";
// $productoNuevo=new Producto(null,"prueba","prueba",666,2,null,66,0);
// ProductoDAO::insert($productoNuevo);



// ProductoDAO::update($producto);
// $productoPrueba=ProductoDAO::findById(6);
 










//Se verifica si se ha especificado la información de la ruta en la solicitud
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
    }elseif($recurso[1]==="categoria"){
        CategoriaController::categoria();
    }

    
} else {
    // Si no se ha especificado la información de la ruta, se devuelve un error 400
    Base::response("HTTP/1.0 400 Direccion incorrecta, no se ha especificado el recurso");
}
?>
