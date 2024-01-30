<?

class Base{

    public Static function response($head,$body=""){

        header($head,$body);
        echo $body;
        exit;
    }

    public static function divideURI() {
        $uri = $_SERVER['PATH_INFO'];
        return explode('/', $uri);
    }

    public static function condiciones(){
        return parse_str($_SERVER['QUERY_STRING'],$filtros);
        return $filtros;
    }
    
}