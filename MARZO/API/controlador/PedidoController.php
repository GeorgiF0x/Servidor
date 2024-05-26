<?php

require_once("./dao/PedidoDAO.php"); 

class PedidoController extends Base {

    public static function pedidos() {
        // Obtener el método de la solicitud HTTP (GET, POST, PUT, DELETE)
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        // Obtener los recursos y filtros de la URI
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        
        // switch para manejar diferentes métodos HTTP
        switch ($metodo) {
            case 'GET':
                // Para todos los pedidos
                if (count($recursos) == 2 && count($filtros) == 0) {
                    $datos = PedidoDAO::findLastRecord();
                }
                // Para buscar pedidos por ID
                elseif (count($recursos) == 3 && count($filtros) == 0) {
                    $datos = PedidoDAO::findById($recursos[2]);
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
                if (isset($datos['Fecha'], $datos['Direccion'], $datos['PagoTotal'], $datos['Borrado'])) {
                    $pedido = new Pedido(
                        null,
                        $datos['Fecha'],
                        $datos['Direccion'],
                        $datos['PagoTotal'],
                        $datos['Borrado']
                    );
                    if (PedidoDAO::insert($pedido)) {
                        self::response('HTTP/1.0 201 Pedido Creado Correctamente');
                    } else {
                        self::response('HTTP/1.0 500 Error al insertar el pedido');
                    }
                } else {
                    self::response('HTTP/1.0 400 No está introduciendo los atributos necesarios (Fecha, Direccion, PagoTotal, Borrado)');
                }
                break;
            
                case 'DELETE':
                    // Verificar si se está solicitando eliminar un producto por ID
                    if (count($recursos) == 3) {
                        $idProducto = $recursos[2];
                        // Verificar si el producto existe antes de intentar eliminarlo
                        if (!empty(ProductoDAO::findById($idProducto))) {
                            // Eliminar el producto de la base de datos
                            if (ProductoDAO::delete($idProducto)) {
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
}
