
<?

    require("./dao/institutoDAO.php");

    class InstitutoController extends Base{

        public static  function institutos(){
            $metodo= $_SERVER['REQUEST_METHOD'];
            $recursos= self::divideURI();
            $filtros= self::condiciones();
            switch ($metodo) {
                    case 'GET':
                        if (count($recursos) == 2 && count($filtros)==0) {   //con 3 no tiene nada detras
         
                            $datos = InstitutoDAO::findAll();
                        }else if (count($recursos) == 2 && count($filtros)>0) {
                           $datos = self::buscarConFiltros();
                           
                           
                        }else if (count($recursos) == 3){
                            $datos = InstitutoDAO::findById($recursos[2]);
                        }
                        $datos = json_encode($datos);
                        self::response('HTTP/1.1 200 OK', $datos);
         
                        break;
                case 'POST':
                    $datos=file_get_contents("php://input");
                    $datos=json_decode($datos,true);
                    if (isset($datos['Nombre']) && isset($datos['Localidad']) && isset($datos['Telefono'])) {
                        //verificar que lo que ha llegado en el body son los institutos
                        $instituto=new Instituto(null,$datos['Nombre'],$datos['Localidad'],$datos['Telefono']);
                        if(InstitutoDAO::Insert($instituto)){
                            $instituto=InstitutoDAO::LastInsert();
                            $instituto=json_decode($instituto);
                            self::response('HTTP/1.1 201 OK, SE HA INSERTADO CORRECTAMENTE',$instituto);
                        }
                    }else{
                        self::response('HTTP/1.1 400 , NO SE HAN ESCRITO LOS DATOS PARA INSERTAR LA NUEVA');
                        
                    }
                    {
                        self::response('HTTP/1.1 400 , NO SE HAN ESCRITO ATRIBUTOS PARA INSERTAR LA NUEVA');
                    }


                    
                    break;
                case 'PUT':
                
                    break;
                case 'DELETE':
                    # code...
                    break;
                
                default:
                    self::response("HTTP/1.1 400  No se permite el metodo utilizado");
                    break;
            }
        }

        static function buscarConFiltros(){
            //comprobar si el nombre del filtro esta permitido 
            $permitimos=['Nombre','Localidad'];
            $filtros=self::condiciones();
            foreach ($filtros as $key => $value) {
                if(!in_array($key,$permitimos)){
                    self::response("HTTP/1.1 400  NO PERMITE EL PARAMETRO INTRODUCITO :".$key);
                }
            }
        return InstitutoDAO::findByFiltros($filtros);
        }
        

        static function put(){
            $recursos = self::divideURI();
            if (count($recursos) == 3){
                $permitimos = array('nombre', 'localidad', 'telefono');
           
            $datos = file_get_contents('php://input');
            $datos = json_decode($datos, true);   //true para que lo devuelva como array asociativo
            foreach ($datos as $key => $value) {
                if (!in_array($key, $permitimos)) {
                    self::response('HTTP/1.1 400 No se permite el filtro '.$key);
                }
            }
            $insti=InstitutoDAO::findByID($recursos[2]);
            if(InstitutoDAO::update($insti)){
                if(count($insti) == 1) {
                    $insti=(object)[$insti[0]];
                    
                }
                
            }
           
           
        }else{
            self::response('HTTP/1.1 400 No ha indicado el id');
        }
     
     
        }

    }