<?php

require("./dao/institutoDAO.php");

class PalabraController extends Base{

    public static function palabras(){
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if(count($recursos) == 2 && count($filtros) == 0){
                    $datos = PalabraDao::findAll();
                }else if(count($recursos) == 2 && count($filtros) > 0){
                    $datos = self::buscaConFiltros();
                }else if((count($recursos) == 3)){
                    $datos = PalabraDao::findbyId($recursos[2]);
                }else{
                    self::response("HTTP/1.0 400 No esta indicando los recursos necesarios");
                    break;
                }
                $datos = json_encode($datos);
                self::response('HTTP/1.0 200 OK', $datos);
                break;

            default:
                self::response("HTTP/1.0 400 No permite el metodo utilizado");
                break;
            
        }
    }

    static function buscaConFiltros(){
        // Comprobar si el nombre del filtro está permitido
        $permitimos = ['num_letras'];
        $filtros = self::condiciones();

        foreach ($filtros as $key => $value) {
            if(!in_array($key,$permitimos)){
                self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
            }
        }

        return PalabraDao::findbyFiltros($filtros);
    }


          
    
}

?>