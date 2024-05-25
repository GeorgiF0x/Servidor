<?
// echo"<pre>";
// print_r($_SESSION['partidos'][0]->id);
 if(isset($_REQUEST['crear_partido'])){
    $errores=array();
    if(validarFormPost($errores)){
        $jug1=$_REQUEST['add_jugador1'];
        $jug2=$_REQUEST['add_jugador2'];
        $fecha=$_REQUEST['add_fecha'];
        $resultado=$_REQUEST['add_resultado'];

        $datos_actualizados = array(
            "jug1" =>  $jug1,
            "jug2" =>  $jug2,
            "fecha" =>  $fecha,
            "resultado" =>  $resultado,
        );


        $postPartido=post("partidos", $datos_actualizados);
        if($postPartido){
            echo "se ha creado correctamente el partido";
            $_SESSION['vista'] = VIEW.'home.php';
            $_SESSION['controlador'] = CON.'homeController.php';   
        }
    }

}