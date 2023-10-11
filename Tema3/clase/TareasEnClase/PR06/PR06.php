<?php
    include("/var/www/Servidor/Fragmentos/header.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        border : solid 1px black;
        margin-top:10%;
        margin-left:1%
        
    }
     td{
        /* width:100px;
        heigh:auto; */
        margin: 2%;
        padding: 2%;
        border:solid black 1px;
    } 
     th{
        border:solid black 1px;
    }
    /*
    .tabla {
         display:flex;
        justify-content:center;
        align-items:center; 
         margin-top:5%;
    }  */
</style>
<body>

<?php
$liga =
array(
    "Zamora" =>  array(
        "Salamanca" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
        ),
        "Avila" => array(
            "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
        ),
        "Valladolid" => array(
            "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
        )
    ),
    "Salamanca" =>  array(
        "Zamora" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
        ),
        "Avila" => array(
            "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
        ),
        "Valladolid" => array(
            "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
        )
    ),
    "Avila" =>  array(
        "Zamora" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
        ),
        "Salamanca" => array(
            "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
        ),
        "Valladolid" => array(
            "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
        )
    ),
    "Valladolid" =>  array(
        "Zamora" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
        ),
        "Salamanca" => array(
            "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
        ),
        "Avila" => array(
            "Resultado" => "1-1", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
        )
    ),
);

?>

<div class="tabla">

    <table border="1">
        <thead>
        <tr>
            <?php
            //    echo " <th> Equipos</th>";
            foreach ($liga as $ciudades => $value) {
                echo "<th>$ciudades</th>";
                $arrayCiudades=array();
                array_push($arrayCiudades,$ciudades);
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <?php
           foreach ($liga as $ciudades => $value) {
                echo "<tr>";
                echo "<td>$ciudades</td>";
               $conta=0;
                foreach ($value as $partidos=>  $partido) {
                    echo "<td>";
                        foreach ($partido as $resultados=> $resultado) {
                            if($arrayCiudades[$conta]==$ciudades){
                                echo " </td>";
                            }else{
                               echo "x";
                            }
                        }
                    }
                    echo"</tr>";
                    $conta++;
            }
                ?>
        




        
        </tbody>
    </table>
</div>




    
</body>
</html>