<?php

require("./dao/AlbaranDao.php");

class AlbaranController extends Base{

    public static function albaranes(){
        // Obtener el método de la solicitud HTTP (GET, POST, PUT, DELETE)
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        // Obtener los recursos y filtros de la URI
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        
        // switch para manejar diferentes métodos HTTP
        switch ($metodo) {
            case 'GET':
                //para todos los productos
                if (count($recursos) == 2 && count($filtros) == 0) {
                    $datos = AlbaranDAO::findAll();
                }
                //para un producto especifico por ID
                elseif (count($recursos) == 3 && count($filtros) == 0) {
                    $datos = AlbaranDAO::findById($recursos[2]);
                }
                //para obtener el último albarán
                elseif (count($recursos) == 2 &&  count($filtros) == 1) {
                    if(isset($filtros['ultimo'])){
                        $datos = AlbaranDAO::findLast();
                    }else{
                        
                    }
                    if ($datos === null) {
                        self::response("HTTP/1.0 404 No se encontró el último albarán");
                        break;
                    }
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
                    $datos = json_decode($datos, true);
                    // Verificar si se han proporcionado los atributos necesarios 
                    if (isset($datos['Fecha'], $datos['IdUsuario'], $datos['Borrado'])) {
                        $albaran = new Albaran(
                            null, 
                            $datos['Fecha'], 
                            $datos['IdUsuario'], 
                            $datos['Borrado']
                        );
                        if (AlbaranDAO::insert($albaran)) {
                            self::response('HTTP/1.0 201 Albarán Creado Correctamente');
                        } else {
                            self::response('HTTP/1.0 500 Error al insertar el albarán');
                        }
                    } else {
                        self::response('HTTP/1.0 400 No está introduciendo los atributos necesarios (Fecha, IdUsuario, Borrado)');
                    }
                    break;
            case 'PUT':
                self::put();
                break;
                case 'DELETE':
                    // Verificar si se está solicitando eliminar un producto por ID
                    if (count($recursos) == 3) {
                        $idProducto = $recursos[2];
                        // Verificar si el producto existe antes de intentar eliminarlo
                        if (!empty(AlbaranDAO::findById($idProducto))) {
                            // Eliminar el producto de la base de datos
                            if (AlbaranDAO::delete($idProducto)) {
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
        $permitimos = ['Fecha'];
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
        $producto = AlbaranDAO::findbyId($recursos[2]);
        if(count($producto) == 1){
            $producto = (object)$producto[0];
            foreach ($datos as $key => $value) {
                $producto->$key = $value;
            }
            if(AlbaranDAO::update($producto)){
                $producto = AlbaranDAO::findbyId($recursos[2]);
                $producto = json_encode($producto);
                self::response('HTTP/1.0 201 Recurso modificado', $producto);
            }else{
                self::response('HTTP/1.0 400 No esta introduciendo los atributos de producto(nombre, localidad, telefono');
            }
        }else{
            self::response('HTTP/1.0 400 No se ha encontrado el producto con ese ID');
        }
    }else{
        self::response('HTTP/1.0 400 No ha indicado el id');
    }
}





    
}