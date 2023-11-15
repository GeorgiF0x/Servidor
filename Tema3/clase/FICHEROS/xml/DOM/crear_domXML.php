<?

    $dom = new DOMDocument('1.0','utf-8');

    $raiz= $dom->appendChild($dom->createElement('instrumentos'));

    $intrumento = $dom->createElement('intrumento');

    $nombre=$dom->createElement("nombre","guitarra");
    $familia = $dom->createElement("familia","cuerda");
    $raiz->appendChild($intrumento);
    $intrumento->appendChild($nombre);
    $intrumento->appendChild($familia);
    $intrumento->setAttribute('id','1');

    $intrumento=$raiz->appendChild($dom->createElement('intrumento'));
    $intrumento->appendChild($dom->createElement('nombre','violin'));
    $intrumento->appendChild($dom->createElement('familia','cuerda'));
    $intrumento->setAttribute('id','2');




    $dom->formatOutput = true;
    $dom->save("instrumentos.xml");

    //leer el fichero
    $dom->load('instrumentos.xml');
    // print_r($dom);
    
    foreach ($dom->childNodes as $instrumentos) {
        foreach ($instrumentos->childNodes as $instrumento) {
            if ($instrumento->nodeType == 1) {
                echo "\n" . $instrumento->getAttribute('id');
                $nodo = $instrumento->firstChild;
                do {
                    if ($nodo->nodeType == 1) {
                        echo "\n" . $nodo->tagName . ":" . $nodo->nodeValue;
                    }
                } while ($nodo = $nodo->nextSibling);
            }
        }
    }


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
