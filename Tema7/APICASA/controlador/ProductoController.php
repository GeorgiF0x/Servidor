<?php

require('./dao/ProductoDAO.php');


class ProductoController extends Base
{

    public static function productos()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if (count($recursos) == 2 && count($filtros) == 0) {   //con 3 no tiene nada detras

                    $datos = ProductoDAO::findByAll();
                } else if (count($recursos) == 2 && count($filtros) > 0) {
                    $datos = self::buscaConFiltros();


                } else if (count($recursos) == 3) {
                    $datos = ProductoDAO::findById($recursos[2]);
                }
                $datos = json_encode($datos);
                self::response('HTTP/1.1 200 OK', $datos);

                break;
            case 'POST':

                $datos = file_get_contents('php://input');
                $datos = json_decode($datos, true);   //true para que lo devuelva como array asociativo
                if (isset($datos['titulo']) && isset($datos['descripcion']) && isset($datos['precio'])&& isset($datos['stock'])&& isset($datos['imagen_url'])) {
                    $producto = new Producto(null, $datos['titulo'], $datos['descripcion'], $datos['precio'], $datos['stock'], $datos['imagen_url'], null);
                    if (ProductoDAO::insert($producto)) {
                        $producto = ProductoDAO::findLastId();
                        $producto = json_encode($producto);
                        self::response('HTTP/1.1 201 OK, Producto insertado correctamente', $producto);
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
                   
                    if (ProductoDAO::delete($recursos[2])) {
                        self::response('HTTP/1.1 201 OK, Producto borrado correctamente');
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
        $permitimos = array('codigo', 'titulo', 'descripcion');
        $filtros = self::condiciones();
        foreach ($filtros as $key => $value) {
            if (!in_array($key, $permitimos)) {
                self::response('HTTP/1.1 400 No se permite el filtro ' . $key);
            }
        }
        return ProductoDAO::findByFiltros($filtros);


    }

    static function put()
    {
        $recursos = self::divideURI();
        if (count($recursos) == 3) {
            $permitimos = array('titulo', 'descripcion', 'precio', 'stock', 'imagen_url');

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
            $producto = ProductoDAO::findById($recursos[2]);
            if (count($producto) == 1) {
                $producto = (object) $producto[0];
                foreach ($datos as $key => $value) {
                    $producto->$key = $value;
                }

                if (ProductoDAO::update($producto)) {
                    $producto = json_encode($producto);
                    self::response('HTTP/1.1 201 OK, Producto actualizado correctamente', $producto);
                }



            } else {
                self::response('HTTP/1.1 400 No ha indicado el id');
            }


        }
    }
}

?>