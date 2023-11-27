<?

    $dom = new DOMDocument('1.0','utf-8');

    $raiz= $dom->appendChild($dom->createElement('instrumentos')); //se crea el elemento raiz

    $intrumento = $dom->createElement('intrumento'); //primer elemento

    $nombre=$dom->createElement("nombre","guitarra"); //primer campo del elemento , se escribe "nombreElmento", "valor"
    $familia = $dom->createElement("familia","cuerda");//segundo campo del elemento
    $raiz->appendChild($intrumento); // se inserta  en el elemento raiz el primer elemento 
    $intrumento->appendChild($nombre);// se insertan los  campos del elemento al propio elemento
    $intrumento->appendChild($familia);
    $intrumento->setAttribute('id','1');
    //otro ejemplo mas 
    $intrumento=$raiz->appendChild($dom->createElement('intrumento'));
    $intrumento->appendChild($dom->createElement('nombre','violin'));
    $intrumento->appendChild($dom->createElement('familia','cuerda'));
    $intrumento->setAttribute('id','2');




    $dom->formatOutput = true;
    $dom->save("instrumentos.xml");

    //leer el fichero y recorrelo 
    $dom->load('instrumentos.xml');
    // print_r($dom);
    foreach ($dom->childNodes as $instrumentos) {
        foreach ($instrumentos->childNodes as $instrumento) {
            if ($instrumento->nodeType == 1) {
                echo "\n" . $instrumento->getAttribute('id');
                $nodo = $instrumento->firstChild;
                do {
                    if ($nodo->nodeType == 1) {
                        echo "\n" . $nodo->tagName . ":" . $nodo->nodeValue."<br>";
                    }
                } while ($nodo = $nodo->nextSibling);
            }
        }
    }

    //para reccorer segun los nombres de sus campos 
    $instrumentoLista=$dom->getElementsByTagName('intrumento');
    echo "<h2>Recorrer con getElement </h2>";
    foreach($instrumentoLista as $value){
        $a = $value->getElementsByTagName('nombre');
        echo "\n".$a->item(0)->tagName. ":" . $a->item(0)->nodeValue;
        $a = $value->getElementsByTagName('familia');
        echo "\n".$a->item(0)->tagName. ":" . $a->item(0)->nodeValue;
    }

?>
<p>
    <a href="descargar.php">Descargar</a>
</p>
