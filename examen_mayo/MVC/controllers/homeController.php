<?
if($_SESSION['usuario']['perfil']=="admin"){
  $datosPartidos=get("partidos");
  $datosPartidos=json_decode($datosPartidos);
  $Partidos=$datosPartidos;
  if($Partidos){
    $_SESSION['partidos']=$Partidos;
  }
}else{
  $datosPartidos=get("partidos?jug1=".$_SESSION['usuario']['id']);
  $datosPartidos=json_decode($datosPartidos);
  $Partidos=$datosPartidos;
  if($Partidos){
    $_SESSION['partidos']=$Partidos;
  }
}


if(isset($_REQUEST['modificar_partido'])){
  $_SESSION['id_partido']=$_REQUEST['partidoId'];
  $_SESSION['vista'] = VIEW.'updatePartido.php';
  $_SESSION['controlador'] = CON.'updateController.php';
}

if(isset($_REQUEST['eliminar_partido'])){
  $idPartido=$_REQUEST['partidoId'];
  if(deleteFromAPI("partidos",$idPartido)){
    echo "se ha eliminado el partido correctamente";
    
  }else{
    echo "error al eliminar";
  }
  $_SESSION['vista'] = VIEW.'home.php';
  $_SESSION['controlador'] = CON.'homeController.php';
}

if(isset($_REQUEST['add_partido'])){
  $_SESSION['vista'] = VIEW.'addPartido.php';
  $_SESSION['controlador'] = CON.'addPartidoController.php';
}




