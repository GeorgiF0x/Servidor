<?php

require("./dao/DetalleAlbaranDAO.php");

class DetalleAlbaranController extends Base {

    public static function detalleAlbaranes() {
        // Obtener el método de la solicitud HTTP (GET, POST, PUT, DELETE)
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        // Obtener los recursos y filtros de la URI
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        
        // switch para manejar diferentes métodos HTTP
        switch ($metodo) {
            case 'GET':
                //para todos los detalles de albaranes
                if (count($recursos) == 2 && count($filtros) == 0) {
                    $datos = DetalleAlbaranDAO::findAll();
                }
                elseif (count($recursos) == 3 && count($filtros) == 0) {
                    $datos = DetalleAlbaranDAO::findById($recursos[2]);
                }
                elseif (count($recursos) == 2 && count($filtros) == 1) {
                    $datos = DetalleAlbaranDAO::findByIdProducto($filtros['IdProducto']);
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
                if (isset($datos['IdAlbaran'], $datos['IdProducto'], $datos['Unidades'], $datos['Borrado'])) {
                    $detalleAlbaran = new DetalleAlbaran(
                        null,
                        $datos['IdAlbaran'],
                        $datos['IdProducto'],
                        $datos['Unidades'],
                        $datos['Borrado']
                    );
                    if (DetalleAlbaranDAO::insert($detalleAlbaran)) {
                        self::response('HTTP/1.0 201 Detalle Albarán Creado Correctamente');
                    } else {
                        self::response('HTTP/1.0 500 Error al insertar el detalle del albarán');
                    }
                } else {
                    self::response('HTTP/1.0 400 No está introduciendo los atributos necesarios (IdAlbaran, IdProducto, Unidades, Borrado)');
                }
                break;
                
            case 'PUT':
                self::put();
                break;
                
            case 'DELETE':
                // Verificar si se está solicitando eliminar un detalle de albarán por ID
                if (count($recursos) == 3) {
                    $idDetalle = $recursos[2];
                    // Verificar si el detalle de albarán existe antes de intentar eliminarlo
                    if (!empty(DetalleAlbaranDAO::findById($idDetalle))) {
                        // Eliminar el detalle de albarán de la base de datos
                        if (DetalleAlbaranDAO::delete($idDetalle)) {
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

    static function put() {
        $recursos = self::divideURI();
        if (count($recursos) == 3) {
            $permitimos = ['IdProducto', 'Unidades'];
            $datos = file_get_contents('php://input');
            $datos = json_decode($datos, true);
            if ($datos == null) {
                self::response('HTTP/1.0 400 El cuerpo no está bien formado');
            }
            // Verificar que lo recibido en el body son los atributos permitidos
            foreach ($datos as $key => $value) {
                if (!in_array($key, $permitimos)) {
                    self::response("HTTP/1.0 400 No se permite la condición utilizada: " . $key);
                }
            }
            $detalle = DetalleAlbaranDAO::findById($recursos[2]);
            if (count($detalle) == 1) {
                $detalle = (object)$detalle;
                foreach ($datos as $key => $value) {
                    $detalle->$key = $value;
                }
                if (DetalleAlbaranDAO::update($detalle)) {
                    $detalle = DetalleAlbaranDAO::findById($recursos[2]);
                    $detalle = json_encode($detalle);
                    self::response('HTTP/1.0 201 Recurso modificado', $detalle);
                } else {
                    self::response('HTTP/1.0 400 No está introduciendo los atributos necesarios (IdAlbaran, IdProducto, Unidades, Borrado)');
                }
            } else {
                self::response('HTTP/1.0 400 No se ha encontrado el detalle de albarán con ese ID');
            }
        } else {
            self::response('HTTP/1.0 400 No ha indicado el id');
        }
    }
}
?>
