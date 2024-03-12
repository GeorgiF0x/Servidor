<?php

require("./dao/UserDAO.php");

class UserController extends Base{

    public static function usuarios(){
        // Obtener el método de la solicitud HTTP (GET, POST, PUT, DELETE)
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        // Obtener los recursos y filtros de la URI
        $recursos = self::divideURI();
        
        // switch para manejar diferentes métodos HTTP
        switch ($metodo) {
            case 'POST':
                // Obtener los datos del cuerpo de la solicitud POST
                $datos = file_get_contents('php://input');
                $datos = json_decode($datos,true);
                
                // Verificar si se han proporcionado los atributos necesarios para crear una matrícula
                if(isset($datos['user'],$datos['token'],$datos['caduca'])){
                    // Crear un objeto Matricula con los datos proporcionados
                    $usuario = new User (null,
                        $datos['user'],
                        $datos['token'],
                        $datos['caduca']
                    );
          
                    // Insertar la matrícula en la base de datos
                    if(matriculaDAO::insert($usuario)){
                        // Obtener la última matrícula insertada
                        $user = UserDAO::findLast();
                        // Convertir la última matrícula a formato JSON y enviar la respuesta
                        $user = json_encode($user);
                        self::response('HTTP/1.0 201 Recurso creado', $matri);
                    }
                }
                // Si no se proporcionan los atributos necesarios, devolver un error
                else{
                    self::response('HTTP/1.0 400 No esta introduciendo los atributos de matricula(nombre, localidad, telefono');
                }
                break;

                case 'GET':
                   
                     if (count($recursos) == 2 && count($filtros) > 0) {
                     
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
            $permitimos = ['user','token'];
            $filtros = self::condiciones();
    
            foreach ($filtros as $key => $value) {
                if(!in_array($key,$permitimos)){
                    self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
                }
            }
    
            return matriculaDAO::findbyFiltros($filtros);
        }


}

?>