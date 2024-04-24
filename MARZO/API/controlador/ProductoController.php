<?php

require("./dao/ProductoDAO.php");

class ProductoController extends Base{

    public static function productos(){
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
                       $datos = ProductoDAO::findAll();
                }
                //para buscar productos por id
                // elseif (count($recursos) == 2 && count($filtros)==1) {
                //     if(isset($filtros['/'])){
                //         $datos= ProductoDAO::findById($filtros['Id']);  
                //     }
                // }
                elseif (count($recursos) == 3 && count($filtros)==0) {
                    
                    $datos=ProductoDAO::findById($recursos[2]);
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
                if (isset($datos['Id'], $datos['Nombre'], $datos['Descripcion'], $datos['Precio'], $datos['Categoria'], $datos['RutaImg'],$datos['CantidadStock'],$datos['Borrado'])) {
                    // Crear un objeto Producto con los datos proporcionados
                    $usuario = new Producto(
                        null, 
                        $datos['Nombre'],
                        $datos['Descripcion'],
                        $datos['Precio'],
                        $datos['Categoria'],
                        $datos['Ruta_img'],
                        $datos['CantidadStock'],
                        $datos['borrado']
                    );
                    
                    UserDAO::insert($usuario);

                }
                // Si no se proporcionan los atributos necesarios, devolver un error
                else{
                    self::response('HTTP/1.0 400 No esta introduciendo los atributos del usuario (nombre, contraseña, email
                    ,fecha de nacimiento y el id de rol');
                }
                break;
            case 'PUT':
                self::put();
                break;
    
        //     case 'DELETE':
        //         // Verificar si se está solicitando eliminar una matrícula por ID
        //         $recursos = self::divideURI();
        //         if(count($recursos) == 3){
        //             // Verificar si la matrícula existe antes de intentar eliminarla
        //             if(!empty(productoDAO::findbyId($recursos[2]))){
        //                 // Eliminar la matrícula de la base de datos
        //                 if(productoDAO::delete($recursos[2])){
        //                     self::response('HTTP/1.0 200 Recurso eliminado');
        //                 }else{
        //                     self::response('HTTP/1.0 400 No se pudo eliminar el recurso');
        //                 }
        //             }else{
        //                 self::response('HTTP/1.0 400 No se pudo localizar el recurso a eliminar');
        //             }
        //         }else{
        //             self::response('HTTP/1.0 400 No ha indicado el id');
        //         }
        //         break;
    
            default:
                // Si se utiliza un método no permitido, devolver un error
                self::response("HTTP/1.0 400 No permite el metodo utilizado");
                break;
    }
}

static function put(){
    $recursos = self::divideURI();
    if(count($recursos) == 3){
        $permitimos = ['CantidadStock','Descripcion','Precio'];
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
        $producto = ProductoDAO::findbyId($recursos[2]);
        if(count($producto) == 1){
            $producto = (object)$producto[0];
            foreach ($datos as $key => $value) {
                $producto->$key = $value;
            }
            if(ProductoDAO::update($producto)){
                $producto = ProductoDAO::findbyId($recursos[2]);
                $producto = json_encode($producto);
                self::response('HTTP/1.0 201 Recurso modificado', $producto);
            }else{
                self::response('HTTP/1.0 400 No esta introduciendo los atributos de producto(nombre, localidad, telefono');
            }
        }else{
            self::response('HTTP/1.0 400 No se ha encontrado el producto con ese ID');
        }
        // if(count($producto) == 1){
        //     $producto = (object)$producto[0];
            
        //     if(productoDAO::update($datos,$producto)){
        //         $producto = productoDAO::findbyId($recursos[2]);
        //         $producto = json_encode($producto);
        //         self::response('HTTP/1.0 201 Recurso modificado', $producto);
        //     }else{
        //         self::response('HTTP/1.0 400 No esta introduciendo los atributos de producto(nombre, localidad, telefono');
        //     }
        // }else{
        //     self::response('HTTP/1.0 400 No se ha encontrado el producto con ese ID');
        // }
    }else{
        self::response('HTTP/1.0 400 No ha indicado el id');
    }
}




    // static function buscaConFiltros(){
    //     // Comprobar si el nombre del filtro está permitido
    //     $permitimos = ['coche_id','producto'];
    //     $filtros = self::condiciones();

    //     foreach ($filtros as $key => $value) {
    //         if(!in_array($key,$permitimos)){
    //             self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
    //         }
    //     }

    //     return productoDAO::findbyFiltros($filtros);
    // }
    
}