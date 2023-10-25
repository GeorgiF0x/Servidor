<?php
$alto = 4; 
$matriz = array(); 

// Primer bucle filas de la matriz
for ($fila = 0; $fila < $alto; $fila++) {
    $matriz[$fila] = array(); 
    // Segundo bucle columnas  fila actual
    for ($ancho = 0; $ancho < $alto; $ancho++) {
        if ($fila == 0 || $ancho==0) {
            // Si es la primera columna  valor  1
            $matriz[$fila][$ancho] = 1;
        } else {
            //calcula el valor sumando los valores de la fila anterior
            $matriz[$fila][$ancho] = $matriz[$fila - 1][$ancho ] + $matriz[$fila][$ancho -1];
            // echo "<pre>";
            // print_r($matriz[$fila][$ancho]);
            // echo "<pre>";
        }
    }
}


// function pintarMatriz($matriz){
//     echo "<table border:1px solid black>";
//     foreach ($matriz as $key => $value) {
//         echo "<tr>";
//         echo "primer foreach";

//         foreach ($value as $cuadrado => $NumCuadrado) {
//             echo "<pre>";
//             echo"<td>". print_r($NumCuadrado)."</td>";
//             echo "</tr>";
//             echo "</pre>";
//         }
//     }
//     echo "</table>";
// }

// pintarMatriz($matriz);

$tabla=array();

for ($i=1 ; $i < 10 ; $i++ ) {
    $tabla[$i]=array(); 
    for ($j=1; $j <10 ; $j++) { 
        $tabla[$i][$j]=$i * $j;
    }
}



?>

<table border="1">
    <thead>
        <?php
            echo "<th> $key</th>";
        foreach ($tabla as $key => $value) {
            echo "<th> $key</th>";
        }
        ?>
    </thead>
    <tbody>
    <?php
            echo "<tr> $key</tr>";
        foreach ($tabla as $key => $value) {
            echo "<tr>";
                echo "<td>$key<td>";
                foreach ($value as  $resultado) {
                    echo "<td> $resultado </td>";
                }
            echo"</tr>";
        }
            ?>
    
    </tbody>
</table>




















