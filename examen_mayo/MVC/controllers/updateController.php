<?
    $partido=get("partidos/".$_SESSION['id_partido']);
    $_SESSION['partido_mod']=$partido;

    if(isset($_REQUEST['partido_cambios'])){
        $errores=array();
        if(validarFormUpdate($errores)){
            $jug1=$_REQUEST['nuevo_jugador1'];
            $jug2=$_REQUEST['nuevo_jugador2'];
            $fecha=$_REQUEST['nueva_fecha'];
            $resultado=$_REQUEST['nuevo_resultado'];

            $datos_actualizados = array(
                "jug1" =>  $jug1,
                "jug2" =>  $jug2,
                "fecha" =>  $fecha,
                "resultado" =>  $resultado,
            );
            if($updatePartido=put("partidos", $_SESSION['id_partido'], $datos_actualizados)){
                echo "Se ha actualizado correctamente el partido";
                //volver a recojer todos los partidos para que aparezcan actualizados 
                $datosPartidos=get("partidos");
                $datosPartidos=json_decode($datosPartidos);
                $Partidos=$datosPartidos;
                if($Partidos){
                  $_SESSION['partidos']=$Partidos;
                }
                $_SESSION['vista'] = VIEW.'home.php';
                $_SESSION['controlador'] = CON.'homeController.php';
            }else {
                echo "error al actualizar el partido";
            }
        }
   
    }
?>