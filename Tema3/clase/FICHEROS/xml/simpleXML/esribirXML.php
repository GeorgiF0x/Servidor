<? 
//con simple XML

//crear y escribirlo

$xml= new SimpleXMLElement("<juegos></juegos>"); //indicar en el argumento la etiqueta principal del XML 

$juego1= $xml->addChild("juego"); //para crear un elemento HIJO del elemento PRINCIPAL
$juego1->addAttribute("id","1");
$juego1->addAttribute("disponible","Si");
$juego1->addChild("nombre","FIFA"); //para crear dentro del hijo otro elemento
$dispositivos = $juego1->addChild("dispositivos");
$dispositivos->addChild("dispositivos","XBOX");
$dispositivos->addChild("dispositivos","PS5");


$juego2= $xml->addChild("juego");
$juego2->addAttribute("id","2");
$juego2->addAttribute("disponible","No");
$juego2->addChild("nombre","GTA");
$dispositivos = $juego2->addChild("dispositivos");
$dispositivos->addChild("dispositivos","XBOX");

$juego2= $xml->addChild("juego");
$juego2->addAttribute("id","3");
$juego2->addAttribute("disponible","Sí");
$juego2->addChild("nombre","TETRIS");
$dispositivos = $juego2->addChild("dispositivos");
$dispositivos->addChild("dispositivos","PC");
$dispositivos->addChild("dispositivos","XBOX");
$dispositivos->addChild("dispositivos","PS5");




echo"<pre>";
print_r($xml);
$xml->asXML('juegos.xml');




