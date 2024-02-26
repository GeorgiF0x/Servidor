<?php
// Se incluyen los archivos necesarios
require("./controlador/Base.php");
require('./controlador/MatriculasController.php');

// Se verifica si se ha especificado la información de la ruta en la solicitud
if(isset($_SERVER['PATH_INFO'])){
    // Se obtiene la información de la ruta y se divide en segmentos
    $recurso = Base::divideURI();
    
    // Se verifica si el primer segmento de la ruta es 'matricula'
    if($recurso[1] === 'matricula'){
        // Si es así, se llama al método 'matriculas()' del controlador 'MatriculasController'
        MatriculasController::matriculas();
    } else {
        // Si no, no se hace nada (puedes agregar aquí lógica adicional para manejar otros recursos)
    }
} else {
    // Si no se ha especificado la información de la ruta, se devuelve un error 400
    Base::response("HTTP/1.0 400 Direccion incorrecta, no se ha especificado el recurso");
}
?>
