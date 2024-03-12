<?php

require("./dao/CochesDAO.php");
class CocheController extends Base{

    public static function coches(){
        // Obtener el método de la solicitud HTTP (GET, POST, PUT, DELETE)
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        // Obtener los recursos y filtros de la URI
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        
        // switch para manejar diferentes métodos HTTP
        switch ($metodo) {
            case 'GET':
                // Verificar si se está solicitando la lista completa de matrículas
                if (count($recursos) == 3 && $recursos[2]=="token/" && count($filtros) == 0) {
                    // Obtener todas las matrículas
                    $datos = CochesDAO::findAll();
                }

                // Verificar si se están aplicando filtros en la solicitud GET
                else if (count($recursos) == 3 && $recursos[2]=="token/" && count($filtros) > 0) {
                    $datos = self::buscaConFiltros();
                }

                // Si no se cumplen las condiciones anteriores, devolver un error
                else {
                    self::response("HTTP/1.0 400 No está indicando los recursos necesarios");
                    break;
                }
                // Convertir los datos a formato JSON y enviar la respuesta
                $datos = json_encode($datos);
                self::response('HTTP/1.0 200 OK', $datos);
                break;
        }
    }

    

    static function buscaConFiltros(){
        // Comprobar si el nombre del filtro está permitido
        $permitimos = ['filtro'];
        $filtros = self::condiciones();

        foreach ($filtros as $key => $value) {
            if(!in_array($key,$permitimos)){
                self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
            }
        }
        return CochesDAO::findbyFiltros($filtros);
    }

    

    




}

?>