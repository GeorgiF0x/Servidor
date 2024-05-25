<?php

require("./dao/CarritoDAO.php");

class CarritoController extends Base{

    public static function carrito(){
        // Obtener el método de la solicitud HTTP (GET, POST, PUT, DELETE)
        $metodo = $_SERVER['REQUEST_METHOD'];
        // Obtener los recursos y filtros de la URI
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        // switch para manejar diferentes métodos HTTP
        switch ($metodo) {
            case 'GET':
                // Inicializar la variable $datos a null
                $datos = null;
            
                // Para todos los productos
                if (count($recursos) == 2 && count($filtros) == 0) {
                    $datos = CarritoDAO::findAll();
                } elseif (count($recursos) == 2 && count($filtros) == 1) {
                    if (isset($filtros['IdUsuario'])) {
                        $datos = CarritoDAO::findByUserId($filtros['IdUsuario']);
                    }
                } elseif (count($recursos) == 2 && count($filtros) == 2) {
                    if (isset($filtros['IdUsuario']) && isset($filtros['IdProducto'])) {
                        $datos = CarritoDAO::findByUserAndProductoId($filtros['IdUsuario'], $filtros['IdProducto']);
                    }
                } else {
                    // Si no se cumplen las condiciones anteriores, devolver un error
                    self::response("HTTP/1.0 400 No está indicando los recursos necesarios");
                    break;
                }
            
                // Verificar si $datos está definido antes de usarlo
                if ($datos !== null) {
                    // Convertir los datos a formato JSON y enviar la respuesta
                    $datos = json_encode($datos);
                    self::response('HTTP/1.0 200 OK', $datos);
                } else {
                    // Si $datos es null, devolver un error
                    self::response("HTTP/1.0 404 No se encontraron datos");
                }
                break;
            case 'POST':
                // Obtener los datos del cuerpo de la solicitud POST
                $datos = file_get_contents('php://input');
                $datos = json_decode($datos,true);
                // Verificar si se han proporcionado los atributos necesarios 
                if (isset( $datos['IdUsuario'], $datos['IdProducto'], $datos['Borrado'],$datos['Cantidad'])) {
                    // Crear un objeto Producto con los datos proporcionados
                    $carrito = new Carrito(
                        null, 
                        $datos['IdUsuario'],
                        $datos['IdProducto'],
                        $datos['Borrado'],
                        $datos['Cantidad']
                    );
                    CarritoDAO::insert($carrito);
                }
                // Si no se proporcionan los atributos necesarios, devolver un error
                else{
                    self::response('HTTP/1.0 400 No esta introduciendo los atributos del Carrito (idUsuario, idProducto, Cantidad)');
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
                        if (!empty(CarritoDAO::findById($idProducto))) {
                            // Eliminar el producto de la base de datos
                            if (CarritoDAO::delete($idProducto)) {
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
        $permitimos = ['Cantidad'];
        $datos = file_get_contents('php://input');
        $datos = json_decode($datos,true);
        if($datos == null){
            self:: response('HTTP/1.0 400 El cuerpo no está bien formado'); 
        }
        // Verificar que lo recibido en el body son los carritos
        foreach ($datos as $key => $value) {
            if(!in_array($key,$permitimos)){
                self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
            }
        }
        $carrito = CarritoDAO::findbyId($recursos[2]);
        if(count($carrito) == 1){
            $carrito = (object)$carrito[0];
            foreach ($datos as $key => $value) {
                $carrito->$key = $value;
            }
            if(CarritoDAO::update($carrito)){
                $carrito = CarritoDAO::findbyId($recursos[2]);
                $carrito = json_encode($carrito);
                self::response('HTTP/1.0 201 Recurso modificado', $carrito);
            }else{
                self::response('HTTP/1.0 400 No esta introduciendo los atributos de carrito(IdUsuario,IdProducto, Cantidad');
            }
        }else{
            self::response('HTTP/1.0 400 No se ha encontrado el carrito con ese ID');
        }
    }else{
        self::response('HTTP/1.0 400 No ha indicado el id');
    }
}




    // static function buscaConFiltros(){
    //     // Comprobar si el nombre del filtro está permitido
    //     $permitimos = ['coche_id','carrito'];
    //     $filtros = self::condiciones();

    //     foreach ($filtros as $key => $value) {
    //         if(!in_array($key,$permitimos)){
    //             self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
    //         }
    //     }

    //     return carritoDAO::findbyFiltros($filtros);
    // }
    
}


