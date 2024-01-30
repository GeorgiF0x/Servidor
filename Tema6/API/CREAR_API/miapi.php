<?

require("./controlador/Base.php");
require ("./controlador/institutoController.php");



    if(isset($_SERVER['PATH_INFO'])){
        
        $recurso= Base::divideURI();
        // echo $recurso[1];
        if($recurso[1]==='institutos'){
            InstitutoController::institutos();
        }else{

        }

    }else{
        Base::response("HTTP/1.1 400  Direccion Incorrecta Not Found");
    }


