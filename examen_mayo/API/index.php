<?php
// Se incluyen los archivos necesarios
require("./controlador/Base.php");
require('./controlador/PartidoController.php');






// $partidos = PartidoDAO::findAll();
// echo "<pre>";
// // print_r($partidos);
// $partidoByJug=PartidoDAO::findByUserId(1,2);
// $partidoInsert=new Partido(null,2,3,"2024-01-14","6-6 6-6 6-6");
// // $post=PartidoDAO::insert($partidoInsert);
// $partidoId=PartidoDAO::findById(9);
// $partidoId[0]['resultado']="7-7 7-7 7-7";
// echo $partidoId[0]['id'];
// // PartidoDAO::update($partidoId);
// print_r($partidoId[0]);
// // print_r($partidoByJug);


// $producto=ProductoDAO::findById(6);
// echo "<pre>";
// $productoNuevo=new Producto(null,"prueba","prueba",666,2,null,66,0);
// ProductoDAO::insert($productoNuevo);

// $cat= new Categoria(null,"Prueba",0);
// if(CategoriaDAO::insert($cat)){
//     echo " se ha insertado Bien";
// }else{
//     echo "se ha insertado Mal";
// }

 










// Se verifica si se ha especificado la información de la ruta en la solicitud

if(isset($_SERVER['PATH_INFO'])){
    // Se obtiene la información de la ruta y se divide en segmentos
    $recurso = Base::divideURI();
   
    if($recurso[1] === 'partidos'){
        PartidoController::partidos();
    }
    // elseif ($recurso[1]==="productos") {
    //     ProductoController::productos();
    // }

    
} else {
    // Si no se ha especificado la información de la ruta, se devuelve un error 400
    Base::response("HTTP/1.0 400 Direccion incorrecta, no se ha especificado el recurso");
}
?>
