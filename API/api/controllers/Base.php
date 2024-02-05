<?

class Base
{
    public static function response($head, $body = '')
    {
        header('Content-Type: application/json');
        header($head);
        echo $body;
        exit;
    }

    public static function divideUri()
    {
        $uri = $_SERVER['PATH_INFO'];
        return explode('/', $uri);
    }
    public static function condiciones()
    {
        $filtros = $_SERVER['QUERY_STRING'];
        parse_str($_SERVER['QUERY_STRING'], $filtros);
        return $filtros;
    }



}

?>