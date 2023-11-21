
<?
//con simple XML


// if (file_exists('./ficheroXML.xml')) {
//     $xml = simplexml_load_file('./ficheroXML.xml');
//     //acesso a la informacion de los elementos sabiendo que contienen (el nombre)
//     foreach ($xml as $elemento) {
//         //acceso a atributos
//         echo "\n El coche " .$elemento['id']. "<br>";
//         echo"<pre>";
//         print_r($elemento);
//         //acceso a nodos hijos 
//         echo "la marca es " .$elemento->marca . "<br>";
//         echo "el modelo es " .$elemento->modelo;
//     }
// } else {
//     exit('Error abriendo ./ficheroXML.xml');
// }

function leerElemento($elemento){
    foreach ($elemento->children() as  $a) {
        echo $a ."<br>";
    }

}



if (file_exists('./ficheroXML.xml')) {
    $xml = simplexml_load_file('./ficheroXML.xml');
    //acesso a la informacion de los elementos sabiendo que contienen (el nombre)
    foreach ($xml as $elemento) {
        leerElemento($elemento);
    }
} else {
    exit('Error abriendo ./ficheroXML.xml');
}

