<?php
$errores = array();

if(isset($_REQUEST['Iniciar_Partida_Aleat'])){
    $_SESSION['controlador']=CON.'juegoController.php';
    require $_SESSION['controlador'];
}else{
    $_SESSION['estadisticas']= EstadiscicaDao::findByUserId($_SESSION['usuario']->id_usuario);    
}

?>




