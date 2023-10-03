<?php
$altura = 5;

for ($i = 1; $i <= $altura; $i++) {
    for ($j = 1; $j <= ($altura - $i); $j++) {
        echo " ";
    }

    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }

//rombo

      $altura = 7;

for ($i = 1; $i <= $altura; $i++) {
    for ($j = 1; $j <= ($altura - $i); $j++) {
        echo " ";
    }

    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }

    echo "\n";
}

for ($i = $altura - 1; $i >= 1; $i--) {
    for ($j = 1; $j <= ($altura - $i); $j++) {
        echo " ";
    }

    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
}
}
