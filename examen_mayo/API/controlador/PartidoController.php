<?php

require("./dao/PartidoDAO.php");

class PartidoController extends Base{

    public static function partidos(){
        // Obtener el método de la solicitud HTTP (GET, POST, PUT, DELETE)
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        // Obtener los recursos y filtros de la URI
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        
        // switch para manejar diferentes métodos HTTP
        switch ($metodo) {
            case 'GET':
                //para todos los productos
                if (count($recursos) == 2 && count($filtros)==0) {
                       $datos = PartidoDAO::findAll();
                }

                elseif (count($recursos) == 3 && count($filtros)==0) {
                    
                    $datos=PartidoDAO::findById($recursos[2]);
                }
                elseif (count($recursos) == 2 && count($filtros)==1) {
                    
                    $datos=PartidoDAO::findByjugador($filtros['jug1']);
                }
                elseif (count($recursos) == 2 && count($filtros)==2) {
                    //ip/partidos/?jug1=2&jug2=1
                    $id1=
                    $datos=PartidoDAO::findByUserId($filtros['jug1'],$filtros['jug2']);
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
            
            
            case 'POST':
                // Obtener los datos del cuerpo de la solicitud POST
                $datos = file_get_contents('php://input');
                $datos = json_decode($datos,true);
                // Verificar si se han proporcionado los atributos necesarios 
                if (isset($datos['jug1'], $datos['jug2'], $datos['fecha'], $datos['resultado'])){
                    $partido= new Partido(
                        null,  
                        $datos['jug1'],
                        $datos['jug2'], 
                        $datos['fecha'], 
                        $datos['resultado']
                    );
                    if (PartidoDAO::insert($partido)) {
                        self::response('HTTP/1.0 201 partido Creado Correctamente');
                    } else {
                        self::response('HTTP/1.0 500 Error al insertar el partido');
                    }  
                } else {
                    self::response('HTTP/1.0 400 No está introduciendo los atributos necesarios (jug1, jug2, fecha,resultado)');
                }
                

                break;
            case 'PUT':
                self::put();
                break;
                case 'DELETE':
                    // Verificar si se está solicitando eliminar un partidopor ID
                    if (count($recursos) == 3) {
                        $idpartido= $recursos[2];
                        // Verificar si el partidoexiste antes de intentar eliminarlo
                        if (!empty(PartidoDAO::findById($idpartido))) {
                            // Eliminar el partidode la base de datos
                            if (PartidoDAO::delete($idpartido)) {
                                self::response('HTTP/1.0 200 Recurso eliminado');
                            } else {
                                self::response('HTTP/1.0 500 No se pudo eliminar el recurso');
                            }
                        } else {
                            self::response('HTTP/1.0 404 No se pudo localizar el recurso a eliminar');
                        }
                    } else {
                        self::response('HTTP/1.0 400 No ha indicado el ID');
                    }
                    break;
    
                default:
                    // Si se utiliza un método no permitido, devolver un error
                    self::response("HTTP/1.0 405 Método no permitido");
                    break;
            }
}

static function put(){
    $recursos = self::divideURI();
    if(count($recursos) == 3){
        $permitimos = ['jug1','jug2','fecha','resultado'];
        $datos = file_get_contents('php://input');
        $datos = json_decode($datos,true);
        if($datos == null){
            self:: response('HTTP/1.0 400 El cuerpo no está bien formado'); 
        }
        // Verificar que lo recibido en el body son los productos
        foreach ($datos as $key => $value) {
            if(!in_array($key,$permitimos)){
                self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
            }
        }
        $partido= PartidoDAO::findbyId($recursos[2]);
        if(count($partido) == 1){
            $partido= (object)$partido[0];
            foreach ($datos as $key => $value) {
                $partido->$key = $value;
            }
            if(PartidoDAO::update($partido)){
                $partido= PartidoDAO::findbyId($recursos[2]);
                $partido= json_encode($partido);
                self::response('HTTP/1.0 201 Recurso modificado', $partido);
            }else{
                self::response('HTTP/1.0 400 No esta introduciendo los atributos de partido(jug1, jug2,fecha,resultado');
            }
        }else{
            self::response('HTTP/1.0 400 No se ha encontrado el partidocon ese ID');
        }
    }else{
        self::response('HTTP/1.0 400 No ha indicado el id');
    }
}





    
}