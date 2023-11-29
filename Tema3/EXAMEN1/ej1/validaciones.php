<?

 
 function crearRadioButon(){

     $generos = ['accion', 'comedia', 'drama', 'terror', 'ciencia_ficcion', 'romance', 'animacion', 'documental', 'aventura'];
     foreach ($generos as $genero) {
        $name = strtolower( $genero); 

        echo "<input type= 'radio' name='genero' id=".$name." value='$name'".recuerdaRadio('genero',$name)." >";
        echo "<label for=".$name.">".$name."</label> <br>";
     }
 }

 function crearXML(){
    $idPeli = (string)$_REQUEST['idPeli'];
    $titulo = (string)$_REQUEST['Titulo'];
    $director = (string)$_REQUEST['Director'];
    $fechaLanz = (string)$_REQUEST['Fecha'];
    $genero = (string)$_REQUEST['Genero'];
    $duracion = (string)$_REQUEST['Duracion'];
    $Actores = (string)$_REQUEST['ActPrincipales'];
    $Sinopsis = (string)$_REQUEST['Sinopsis'];

    $xml = new SimpleXMLElement("<Peliculas></Peliculas>");
    $peli = $xml->addChild("Pelicula"); //para crear un elemento HIJO del elemento PRINCIPAL
    $peli->addAttribute("id", $idPeli);
    $peli->addChild("Titulo", $titulo);
    $peli->addChild("Director", $director);
    $peli->addChild("Año Lanzamiento", $fechaLanz);
    $peli->addChild("Genero", $genero);
    $peli->addChild("duracion", $duracion);
    $peli->addChild("Actores Principales", $Actores);
    $peli->addChild("Sinopsis", $Sinopsis);

    $xml->asXML('./peliculas.xml');
}

 function BuscarEnXML($peli){
    //para leer el fichero xml
    function leerElemento($elemento){
        foreach ($elemento->children() as  $a) {
            echo $a ."<br>";
        }
    
    }
    
    if (file_exists('./peliculas.xml')) {
        $xml = simplexml_load_file('./peliculas.xml');
        //acesso a la informacion de los elementos sabiendo que contienen (el nombre)
        foreach ($xml as $elemento) {
            leerElemento($elemento);
        }
    } else {
        exit('Error abriendo ./peliculas.xml');
    }
 }


 //Validaciones Formulario 

 //para validar input text
function textVacio($name)
{
    if (empty($_REQUEST[$name])) {
        return true;
    }
    return false;
}

//para validar Radio buttons
function radioVacio($name)
{
    if (isset($_REQUEST[$name])) {
        return false;
    }
    return true;
}


//para  comprobar si se ha enviado
function enviado()
{
    if (isset($_REQUEST['Enviar'])) {
        return true;
    }
    return false;
}
//para comprobar si esta en el array de errores antes de validar 
function errores($errores, $name)
{
    if (isset($errores[$name])) {
        echo $errores[$name];
    }
}
//para que al enviar se guarden los campos rellenos 
function recuerda($name)
{
    if (enviado() && !empty($_REQUEST[$name])) {
        echo $_REQUEST[$name];
    } else if (isset($_REQUEST['borrar'])) {
        echo "";
    }
}
//para guardar los campos radio rellenos
function recuerdaRadio($name, $value)
{
    if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value) {
        echo " checked ";
    } else if (isset($_REQUEST['borrar'])) {
        echo "";
    }
}




//valida formulario
function validarFormulario(&$errores){
    if (textVacio('idPeli')) {
        $errores['idPeli'] = "id Pelicula esta vacio->";
    } elseif (!preg_match('/^[A-Z]{2}\-[0-9]{3}$/', $_REQUEST['idPeli'])) {
        $errores['idPeli'] = "ID PELICULA no cumple el patron -> ";
    }
    if (textVacio('Titulo')) {
        $errores['Titulo'] = "Titulo esta Vacio->";
    } if (textVacio('Director')) {
        $errores['Director'] = "Director está vacío -> ";
    }
    if(radioVacio('Genero')){
        $errores['Genero'] = "Genero esta Vacio->";
    }
    if (textVacio('Fecha')) {
        $errores['Fecha'] = "Fecha está vacía -> ";
    } elseif (!preg_match('/^[0-9]{4}$/', $_REQUEST['Fecha'])) {
        $errores['Fecha'] = "Formato de fecha no válido -> ";
    }
    if (textVacio('Duracion')) {
        $errores['Duracion'] = "Duracion está vacío -> ";
    } elseif (!preg_match('/^\d{2}\:\d{2}\:\d{2}$/', $_REQUEST['Duracion'])) {
        $errores['Duracion'] = "Formato de Duracion no válido -> ";
    }
    if (textVacio('ActPrincipales')) {
        $errores['ActPrincipales'] = "Actores Principales está vacío -> ";
    } elseif (!preg_match('/(^(\w+)\,){1,}/', $_REQUEST['ActPrincipales'])) {
        $errores['ActPrincipales'] = "El formato de los actores Principales no es válido -> ";
    }
    if (textVacio('Sinopsis')) {
        $errores['Sinopsis'] = "Sinopsis está vacío -> ";
    } elseif (!preg_match('/\w{1,50}/', $_REQUEST['Sinopsis'])) {
        $errores['Sinopsis'] = "El formato de la sinopsis no es válido -> ";
    }
}
//validar si esta correcto el formulario de buscar
function validarFormulario2(&$errores){
    if (textVacio('Busca')) {
        $errores['Busca'] = "Titulo de la peli que buscas esta vacio->";
    } 
}
 ?>