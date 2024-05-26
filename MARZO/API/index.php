<?php
// Se incluyen los archivos necesarios
require("./controlador/Base.php");
require('./controlador/UserController.php');
require('./controlador/ProductoController.php');
require('./controlador/CarritoController.php');
require('./controlador/CategoriaController.php');
require('./controlador/AlbaranController.php');
require('./controlador/DetalleAlbaranController.php');
require('./controlador/PedidoController.php');
require('./controlador/DetallePedidoController.php');




//Se verifica si se ha especificado la información de la ruta en la solicitud
if(isset($_SERVER['PATH_INFO'])){
    // Se obtiene la información de la ruta y se divide en segmentos
    $recurso = Base::divideURI();
   
    if($recurso[1] === 'usuarios'){
        UserController::usuarios();
    }
    elseif ($recurso[1]==="productos") {
        ProductoController::productos();
    }elseif($recurso[1]==="carritos"){
        CarritoController::carrito();
    }elseif($recurso[1]==="categorias"){
        CategoriaController::categoria();
    }elseif($recurso[1]==="albaranes"){
        AlbaranController::albaranes();
    }
    elseif($recurso[1]==="detalleAlbaranes"){
        DetalleAlbaranController::detalleAlbaranes();
    }   elseif($recurso[1]==="pedidos"){
        PedidoController::pedidos();
    }elseif($recurso[1]==="detallePedidos"){
        DetallePedidoController::detallePedidos();
    }


    
} else {
    // Si no se ha especificado la información de la ruta, se devuelve un error 400
    Base::response("HTTP/1.0 400 Direccion incorrecta, no se ha especificado el recurso");
}
?>
