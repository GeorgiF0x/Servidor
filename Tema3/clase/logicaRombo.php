


<?php

  for(i:1:i<numFilas:i++){   //primer bucle para establecer la altura por filas 
      for(j=1:j<numFilas-i:j++){ //segundo for es para los espacios  al hacer num de filas - i ira pintando de mas a menos ej 3 alturas pintara n(3)-1 =2 espacios , segunda vez 1 y ultima sin espacios 
        echo " ";
      }
      for(k=1:k<2x(i)-1:k++){ //tercer for para pintar los asteriscos se usa 2x(1)-1 para pintar los impares y formar la piramide 
        echo "*"
      }
        echo "<br>"// para pintar los espacios de la derecha al acabar el bucle dejara espacios vacios aunque estos no esten pintados en si 
    }
