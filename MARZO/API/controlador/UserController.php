<?php

require("./dao/UserDAO.php");

class UserController extends Base{

    public static function usuarios(){
        // Obtener el método de la solicitud HTTP (GET, POST, PUT, DELETE)
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        // Obtener los recursos y filtros de la URI
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        
        // switch para manejar diferentes métodos HTTP
        switch ($metodo) {
            case 'GET':

                if (count($recursos) == 2 && count($filtros)==2) {
                   if(isset($filtros['Nombre'])&&isset($filtros['Contraseña'])){
                       $datos = UserDAO::validarUser($filtros['Nombre'],$filtros['Contraseña']);
                       echo " **PRUEBA**<pre>";
                       print_r($datos);
                       echo"<br>*******************************************************<br>";
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
            
            
        //     case 'POST':
        //         // Obtener los datos del cuerpo de la solicitud POST
        //         $datos = file_get_contents('php://input');
        //         $datos = json_decode($datos,true);
                
        //         // Verificar si se han proporcionado los atributos necesarios para crear una matrícula
        //         if(isset($datos['coche_id'],$datos['matricula'])){
        //             // Crear un objeto Matricula con los datos proporcionados
        //             $matricula = new Matricula (null,
        //                 $datos['coche_id'],
        //                 $datos['matricula']
        //             );
                    
        //             // Insertar la matrícula en la base de datos
        //             if(matriculaDAO::insert($matricula)){
        //                 // Obtener la última matrícula insertada
        //                 $matri = matriculaDAO::findLast();
        //                 // Convertir la última matrícula a formato JSON y enviar la respuesta
        //                 $matri = json_encode($matri);
        //                 self::response('HTTP/1.0 201 Recurso creado', $matri);
        //             }
        //         }
        //         // Si no se proporcionan los atributos necesarios, devolver un error
        //         else{
        //             self::response('HTTP/1.0 400 No esta introduciendo los atributos de matricula(nombre, localidad, telefono');
        //         }
        //         break;
            
        //     case 'PUT':
            
        //         self::put();
        //         break;
    
        //     case 'DELETE':
        //         // Verificar si se está solicitando eliminar una matrícula por ID
        //         $recursos = self::divideURI();
        //         if(count($recursos) == 3){
        //             // Verificar si la matrícula existe antes de intentar eliminarla
        //             if(!empty(matriculaDAO::findbyId($recursos[2]))){
        //                 // Eliminar la matrícula de la base de datos
        //                 if(matriculaDAO::delete($recursos[2])){
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




    // static function buscaConFiltros(){
    //     // Comprobar si el nombre del filtro está permitido
    //     $permitimos = ['coche_id','matricula'];
    //     $filtros = self::condiciones();

    //     foreach ($filtros as $key => $value) {
    //         if(!in_array($key,$permitimos)){
    //             self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
    //         }
    //     }

    //     return matriculaDAO::findbyFiltros($filtros);
    // }
    

    
}

