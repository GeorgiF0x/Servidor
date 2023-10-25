<?php


//crear Tabla con matriz
$conta=1;
for ($i=1 ; $i < 8 ; $i++ ) {
    $arrayNumeros[$i]=array(); 
    for ($j=1; $j <8 ; $j++) {
        $arrayNumeros[$i][$j]=$conta;
        $conta++;
        if($i==7 && $j==7){
            $arrayNumeros[$i+1][1]=$conta;
        }
    }
}
//recoger los numeros con la url
$arrayVariables=array();
$num1=$_GET['num1'];
$num2=$_GET['num2'];
$num3=$_GET['num3'];
$num4=$_GET['num4'];
array_push($arrayVariables,(int)$num1,(int)$num2,(int)$num3,(int)$num4);
echo "<pre>";
print_r($arrayVariables);
echo "</pre>";
echo "<br>";

$ValoresIguales=array_intersect($arrayNumeros,$arrayVariables);

foreach ($ValoresIguales as $key => $value) {
    echo $value;
}
// $arrayComparado = array_intersect($arrayNumeros, $arrayVariables);



?>


<table border="1">
    <tbody>
    <?php
        foreach ($arrayNumeros as $key => $value) {
            echo "<tr>";
                foreach ($value as  $resultado) {
                //    if(in_array($resultado,$arrayComparado)){
                //     echo "<th> $resultado </th>";
                //    }
                    echo "<td> $resultado </td>";
                }
            echo"</tr>";
        }
        ?>
    </tbody>
</table>

