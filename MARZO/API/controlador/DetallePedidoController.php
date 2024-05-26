<?php

require("./dao/DetallePedidoDAO.php");

class DetallePedidoController extends Base {

    public static function detallePedidos() {
        // Obtener el método de la solicitud HTTP (GET, POST, PUT, DELETE)
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        // Obtener los recursos y filtros de la URI
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        
        // switch para manejar diferentes métodos HTTP
        switch ($metodo) {
            case 'GET':
                // Para todos los detalles de pedidos
                if (count($recursos) == 2 && count($filtros) == 0) {
                    $datos = DetallePedidoDAO::findAll();
                }
                // Para buscar detalles de pedido por ID
                elseif (count($recursos) == 3 && count($filtros) == 0) {
                    $datos = DetallePedidoDAO::findById($recursos[2]);
                }
                // Para buscar detalles de pedido por IDProducto
                elseif (count($recursos) == 2 && count($filtros) == 1) {
                    $datos = DetallePedidoDAO::findByIdProducto($filtros['IdProducto']);
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
                if (isset($datos['IdPedido'], $datos['IdProducto'], $datos['Cantidad'], $datos['PrecioUnidad'], $datos['Total'], $datos['Borrado'])) {
                    $detallePedido = new DetallePedido(
                        null,
                        $datos['IdPedido'],
                        $datos['IdProducto'],
                        $datos['Cantidad'],
                        $datos['PrecioUnidad'],
                        $datos['Total'],
                        $datos['Borrado']
                    );
                    if (DetallePedidoDAO::insert($detallePedido)) {
                        self::response('HTTP/1.0 201 Detalle Pedido Creado Correctamente');
                    } else {
                        self::response('HTTP/1.0 500 Error al insertar el detalle del pedido');
                    }
                } else {
                    self::response('HTTP/1.0 400 No está introduciendo los atributos necesarios (IdPedido, IdProducto, Cantidad, PrecioUnidad, Total, Borrado)');
                }
                break;
                
            case 'PUT':
                self::put();
                break;
                
            case 'DELETE':
                // Verificar si se está solicitando eliminar un detalle de pedido por ID
                if (count($recursos) == 3) {
                    $idDetalle = $recursos[2];
                    // Verificar si el detalle de pedido existe antes de intentar eliminarlo
                    if (!empty(DetallePedidoDAO::findById($idDetalle))) {
                        // Eliminar el detalle de pedido de la base de datos
                        if (DetallePedidoDAO::delete($idDetalle)) {
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
            $permitidos = ['IdPedido', 'IdProducto', 'Cantidad', 'PrecioUnidad', 'Total', 'Borrado'];
            $datos = file_get_contents('php://input');
            $datos = json_decode($datos, true);
            if ($datos == null) {
                self::response('HTTP/1.0 400 El cuerpo no está bien formado');
            }
            // Verificar que lo recibido en el body son los atributos permitidos
            foreach ($datos as $key => $value) {
                if (!in_array($key, $permitidos)) {
                    self::response("HTTP/1.0 400 No se permite la condición utilizada: " . $key);
                }
            }
            $detalle = DetallePedidoDAO::findById($recursos[2]);
            if (count($detalle) == 1) {
                $detalle = (object)$detalle;
                foreach ($datos as $key => $value) {
                    $detalle->$key = $value;
                }
                if (DetallePedidoDAO::update($detalle)) {
                    $detalle = DetallePedidoDAO::findById($recursos[2]);
                    $detalle = json_encode($detalle);
                    self::response('HTTP/1.0 201 Recurso modificado', $detalle);
                } else {
                    self::response('HTTP/1.0 400 No está introduciendo los atributos necesarios (IdPedido, IdProducto, Cantidad, PrecioUnidad, Total, Borrado)');
                }
            } else {
                self::response('HTTP/1.0 400 No se ha encontrado el detalle de pedido con ese ID');
            }
        } else {
            self::response('HTTP/1.0 400 No ha indicado el ID');
        }
    }
}
?>
