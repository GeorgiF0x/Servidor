<?
if(isset($_SESSION['Iniciar_Partida_Aleat'])){
    $_SESSION['controlador'] = CON.'PartidaController.php';
    require $_SESSION['controlador'];
}
else{
    $estadisticas = PartidaDAO::findByUser($_SESSION['usuario']->id_usuario);
}
