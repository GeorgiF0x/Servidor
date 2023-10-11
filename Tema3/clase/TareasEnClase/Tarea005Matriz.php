<?php
$alto = 5; 
$matriz = array(); 

// Primer bucle filas de la matriz
for ($fila = 0; $fila < $alto; $fila++) {
    $matriz[$fila] = array(); 
    // Segundo bucle columnas  fila actual
    for ($ancho = 0; $ancho <= $fila; $ancho++) {
        if ($ancho == 0) {
            // Si es la primera columna de la fila, establece el valor en 1
            $matriz[$fila][$ancho] = 1;
        } else {
            // Si no es la primera columna, calcula el valor sumando los valores de la fila anterior
            $matriz[$fila][$ancho] = $matriz[$fila + 1][$ancho + 1] + $matriz[$fila + 1][$ancho];
        }
    }
}



// Imprimir la matriz respetando filas y columnas









