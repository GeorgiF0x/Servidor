<?php

require('./dao/InstitutoDAO.php');


class InstitutoController extends Base
{

    public static function institutos()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if (count($recursos) == 2 && count($filtros) == 0) {   //con 3 no tiene nada detras

                    $datos = InstitutoDAO::findByAll();
                } else if (count($recursos) == 2 && count($filtros) > 0) {
                    $datos = self::buscaConFiltros();


                } else if (count($recursos) == 3) {
                    $datos = InstitutoDAO::findById($recursos[2]);
                }
                $datos = json_encode($datos);
                self::response('HTTP/1.1 200 OK', $datos);

                break;
            case 'POST':

                $datos = file_get_contents('php://input');
                $datos = json_decode($datos, true);   //true para que lo devuelva como array asociativo
                if (isset($datos['nombre']) && isset($datos['localidad']) && isset($datos['telefono'])) {
                    $instituto = new Instituto(null, $datos['nombre'], $datos['localidad'], $datos['telefono']);
                    if (InstitutoDAO::insert($instituto)) {
                        $instituto = InstitutoDAO::findLastId();
                        $instituto = json_encode($instituto);
                        self::response('HTTP/1.1 201 OK, Instituto insertado correctamente', $instituto);
                    }
                } else {
                    self::response('HTTP/1.1 400 No se han introducido todos los datos (nombre, localidad, telefono)');
                }


                break;
            case 'PUT':
                self::put();


                break;
            case 'DELETE':
                if (count($recursos) == 3) {
                   
                    if (InstitutoDAO::delete($recursos[2])) {
                        self::response('HTTP/1.1 201 OK, Instituto borrado correctamente');
                    } else {
                        self::response('HTTP/1.1 200 No ha encontrado el id');
                    }
                } else {
                    self::response('HTTP/1.1 400 No ha indicado el id');
                }

                break;
            default:
                self::response('HTTP/1.1 400 No permite el metodo utilizado');
                break;
        }

    }
    static function buscaConFiltros()
    {
        //comprobar si el nombre del filtro esta permitido
        $permitimos = array('nombre', 'localidad');
        $filtros = self::condiciones();
        foreach ($filtros as $key => $value) {
            if (!in_array($key, $permitimos)) {
                self::response('HTTP/1.1 400 No se permite el filtro ' . $key);
            }
        }
        return InstitutoDAO::findByFiltros($filtros);


    }

    static function put()
    {
        $recursos = self::divideURI();
        if (count($recursos) == 3) {
            $permitimos = array('nombre', 'localidad', 'telefono');

            $datos = file_get_contents('php://input');
            $datos = json_decode($datos, true);   //true para que lo devuelva como array asociativo
            if ($datos == null) {
                self::response('HTTP/1.1 400 No se han introducido todos los datos , o el json no esta bien formado');
            }
            foreach ($datos as $key => $value) {
                if (!in_array($key, $permitimos)) {
                    self::response('HTTP/1.1 400 No se permite el filtro ' . $key);
                }
            }
            $instituto = InstitutoDAO::findById($recursos[2]);
            if (count($instituto) == 1) {
                $instituto = (object) $instituto[0];
                foreach ($datos as $key => $value) {
                    $instituto->$key = $value;
                }

                if (InstitutoDAO::update($instituto)) {
                    $instituto = json_encode($instituto);
                    self::response('HTTP/1.1 201 OK, Instituto actualizado correctamente', $instituto);
                }



            } else {
                self::response('HTTP/1.1 400 No ha indicado el id');
            }


        }
    }
}

?>