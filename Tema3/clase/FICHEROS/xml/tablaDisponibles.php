<?


echo "<h1>Juegos Disponibles</h1>";




function leerElemento($elemento){

    foreach ($elemento->children() as  $a) {
        if($elemento->attributes()[1]=="Si"){
            echo "<th>".$a->getname(). "<th>" ;
        }
    }


}

function leerElementoTD($elemento){
    echo "<tr>";
    foreach ($elemento->children() as  $a) {
        if($elemento->attributes()[1]=="Si"||$elemento->attributes()[1]=="Sí"){
            echo "<td>".$a."</td>";
            echo "<td>".$a->dispositivos."</td>";
        }
    }
    echo "</tr>";
}






?>

<table border="1px">
    <thead>
        <tr>
       
    <?
    if (file_exists('juegos.xml')) {
        $xml = simplexml_load_file('juegos.xml');
        //acesso a la informacion de los elementos sabiendo que contienen (el nombre)
        foreach ($xml as $elemento) {
            leerElemento($elemento);
        }
    } else {
        exit('Error abriendo juegos.xml');
    }

    ?>     
        </tr>
    </thead>
    <tbody>
    <?
       foreach ($xml as $elemento) {
        leerElementoTD($elemento);
    }


    ?>
    </tbody>
</table>
<?

//Cambiar Atributos del XML

    if (file_exists('juegos.xml')) {
        $xml = simplexml_load_file('juegos.xml');
        //acesso a la informacion de los elementos sabiendo que contienen (el nombre)
        foreach ($xml as $elemento) {
            if($juego[0]['id']=="1"){
                if($juego[0]["disponible"]=='si')
                    $juego[0]['disponible']='no';
            }else{
                $juego[0]['disponible']='no';
            }
            break;
        }
    } else {
        exit('Error abriendo juegos.xml');
    }
