<?php

require("./dao/MatriculaDAO.php");

class MatriculasController extends Base{

    public static function matriculas(){
        // Obtener el método de la solicitud HTTP (GET, POST, PUT, DELETE)
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        // Obtener los recursos y filtros de la URI
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        
        // switch para manejar diferentes métodos HTTP
        switch ($metodo) {
            case 'GET':
                // Verificar si se está solicitando la lista completa de matrículas
                if (count($recursos) == 2 && count($filtros) == 0) {
                    // Obtener todas las matrículas
                    $datos = MatriculaDAO::findAll();
                }
                // Verificar si se están aplicando filtros en la solicitud GET
                else if (count($recursos) == 2 && count($filtros) > 0) {
                    // Buscar matrículas con filtros
                    $datos = self::buscaConFiltros();
                }
                // Verificar si se está solicitando una matrícula específica por ID
                else if (count($recursos) == 3 && is_numeric($recursos[2])) {
                    // Obtener matrícula por ID
                    $datos = MatriculaDAO::findById($recursos[2]);
                }
                // Verificar si se está solicitando una matrícula aleatoria
                else if (count($recursos) == 3 && $recursos[2] === 'random') {
                    // Obtener matrícula aleatoria
                    $datos = MatriculaDAO::findRandom();
                }
                // Verificar si se está solicitando matrículas por coche_id
                else if (count($recursos) == 4 && $recursos[2] === 'coche_id') {
                    // Obtener matrícula por ID de coche
                    $cocheId = $recursos[3];
                    $datos = MatriculaDao::findByCocheId($cocheId);
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
                
                // Verificar si se han proporcionado los atributos necesarios para crear una matrícula
                if(isset($datos['coche_id'],$datos['matricula'])){
                    // Crear un objeto Matricula con los datos proporcionados
                    $matricula = new Matricula (null,
                        $datos['coche_id'],
                        $datos['matricula']
                    );
                    
                    // Insertar la matrícula en la base de datos
                    if(matriculaDAO::insert($matricula)){
                        // Obtener la última matrícula insertada
                        $matri = matriculaDAO::findLast();
                        // Convertir la última matrícula a formato JSON y enviar la respuesta
                        $matri = json_encode($matri);
                        self::response('HTTP/1.0 201 Recurso creado', $matri);
                    }
                }
                // Si no se proporcionan los atributos necesarios, devolver un error
                else{
                    self::response('HTTP/1.0 400 No esta introduciendo los atributos de matricula(nombre, localidad, telefono');
                }
                break;
            
            case 'PUT':
                // Llamar a la función put() para manejar las solicitudes PUT
                self::put();
                break;
    
            case 'DELETE':
                // Verificar si se está solicitando eliminar una matrícula por ID
                $recursos = self::divideURI();
                if(count($recursos) == 3){
                    // Verificar si la matrícula existe antes de intentar eliminarla
                    if(!empty(matriculaDAO::findbyId($recursos[2]))){
                        // Eliminar la matrícula de la base de datos
                        if(matriculaDAO::delete($recursos[2])){
                            self::response('HTTP/1.0 200 Recurso eliminado');
                        }else{
                            self::response('HTTP/1.0 400 No se pudo eliminar el recurso');
                        }
                    }else{
                        self::response('HTTP/1.0 400 No se pudo localizar el recurso a eliminar');
                    }
                }else{
                    self::response('HTTP/1.0 400 No ha indicado el id');
                }
                break;
    
            default:
                // Si se utiliza un método no permitido, devolver un error
                self::response("HTTP/1.0 400 No permite el metodo utilizado");
                break;
        }
    }




    static function buscaConFiltros(){
        // Comprobar si el nombre del filtro está permitido
        $permitimos = ['coche_id','matricula'];
        $filtros = self::condiciones();

        foreach ($filtros as $key => $value) {
            if(!in_array($key,$permitimos)){
                self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
            }
        }

        return matriculaDAO::findbyFiltros($filtros);
    }

    static function put(){
        $recursos = self::divideURI();
        if(count($recursos) == 3){
            $permitimos = ['coche_id','matricula'];
            $datos = file_get_contents('php://input');
            $datos = json_decode($datos,true);
            if($datos == null){
                self:: response('HTTP/1.0 400 El cuerpo no está bien formado'); 
            }
            // Verificar que lo recibido en el body son los matriculas
            foreach ($datos as $key => $value) {
                if(!in_array($key,$permitimos)){
                    self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
                }
            }
            $matricula = matriculaDAO::findbyId($recursos[2]);
            if(count($matricula) == 1){
                $matricula = (object)$matricula[0];
                foreach ($datos as $key => $value) {
                    $matricula->$key = $value;
                }
                if(matriculaDAO::update($matricula)){
                    $matricula = matriculaDAO::findbyId($recursos[2]);
                    $matricula = json_encode($matricula);
                    self::response('HTTP/1.0 201 Recurso modificado', $matricula);
                }else{
                    self::response('HTTP/1.0 400 No esta introduciendo los atributos de matricula(nombre, localidad, telefono');
                }
            }else{
                self::response('HTTP/1.0 400 No se ha encontrado el matricula con ese ID');
            }
            // if(count($matricula) == 1){
            //     $matricula = (object)$matricula[0];
                
            //     if(matriculaDAO::update($datos,$matricula)){
            //         $matricula = matriculaDAO::findbyId($recursos[2]);
            //         $matricula = json_encode($matricula);
            //         self::response('HTTP/1.0 201 Recurso modificado', $matricula);
            //     }else{
            //         self::response('HTTP/1.0 400 No esta introduciendo los atributos de matricula(nombre, localidad, telefono');
            //     }
            // }else{
            //     self::response('HTTP/1.0 400 No se ha encontrado el matricula con ese ID');
            // }
        }else{
            self::response('HTTP/1.0 400 No ha indicado el id');
        }
    }
}

?>