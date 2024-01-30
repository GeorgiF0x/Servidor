
<?

    require("./dao/institutoDAO.php");

    class InstitutoController extends Base{

        public static  function institutos(){
            $metodo= $_SERVER['REQUEST_METHOD'];
            $recursos= self::divideURI();
            $filtros= self::condiciones();
            switch ($metodo) {
                case 'GET':
                    if(count($recursos)==2 && count($filtros)==0){

                       $datos= InstitutoDAO::findAll();
                    }else if(count($recursos)==2 && count($filtros)==3){
                        self::buscarConFiltros();
                    }
                    $datos=json_encode($datos);
        
                    self::response("HTTP/1.1 200 OK", $datos);
                    break;
                case 'POST':
                    if(count($recursos)==3 && count($filtros)){
                        $datos= InstitutoDAO::findByID($recursos[2]);
                     }

                     $datos=json_encode($datos);
                     self::response("HTTP/1.1 200 OK", $datos);
                    break;
                case 'PUT':
                    # code...
                    break;
                case 'DELETE':
                    # code...
                    break;
                
                default:
                    self::response("HTTP/1.1 400  No se permite el metodo utilizado");
                    break;
            }
        }

        function buscarConFiltros(){
            //comprobar si el nombre del filtro esta permitido 
            $permitimos=['Nombre','Localidad'];
            $filtros=self::condiciones();
            foreach ($filtros as $key => $value) {
                if(!in_array($key,$permitimos)){
                    self::response("HTTP/1.1 400  NO PERMITE EL PARAMETRO INTRODUCITO :".$key);
                }
            }
        }
        

    }