<?php
// Se incluyen los archivos necesarios
require("./controlador/Base.php");
require('./controlador/UserController.php');

// require_once('./dao/UserDAO.php');
// echo "PRUEBA";
// echo"<pre>";
// $prueba=UserDAO::validarUser("georgi","userpass");
// print_r($prueba);








// Se verifica si se ha especificado la información de la ruta en la solicitud
if(isset($_SERVER['PATH_INFO'])){
    // Se obtiene la información de la ruta y se divide en segmentos
    $recurso = Base::divideURI();
   
    if($recurso[1] === 'usuarios'){
        UserController::usuarios();
    }
    // elseif ($recurso[1]==="usuarios") {
    //     UserController::usuarios();
    // }

    
} else {
    // Si no se ha especificado la información de la ruta, se devuelve un error 400
    Base::response("HTTP/1.0 400 Direccion incorrecta, no se ha especificado el recurso");
}
?>
