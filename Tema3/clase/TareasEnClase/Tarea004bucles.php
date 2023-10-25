<?php

function dibujarTriangulo($altura){


 for ($i=1; $i < $altura ; $i++) { 
    for ($j=1; $j <$altura-1 ; $j++) { 
        echo "&nbsp";
      }
      for ($k=1;$k<(2 * $i)-1;$k++){
        echo "*";
      }
      echo " <br>";
    }
}

function dibujarTrianguloReves($altura){

  for ($i=$altura; $i>1; $i--) { 
    for ($j=1; $j <$altura-1 ; $j++) { 
        echo "&nbsp";
      }
      for ($k=1;$k<(2 * $i)-1;$k++){
        echo "*";
      }
      echo " <br>";
    }
}

dibujarTriangulo(6);
echo "<br>";
dibujarTriangulo(6);
dibujarTrianguloReves(6);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <h2>
    <?php
    dibujarTriangulo(6);
    dibujarTrianguloReves(6);
    ?>
  </h2>
  
</body>
</html>

