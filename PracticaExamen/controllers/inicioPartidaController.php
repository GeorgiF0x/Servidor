<?php
$errores = array();

if(isset($_REQUEST['Iniciar_Partida_Aleat'])){
    $_SESSION['controlador'] = CON . 'juegoController.php';
    require $_SESSION['controlador'];
} else {
    // Si se inicia una partida aleatoria, redirecciona al controlador de juego
    $_SESSION['estadisticas'] = EstadisticaDao::findByUserId($_SESSION['usuario']->id_usuario);

    // Si se inicia una partida personalizada, se actualizarán las estadísticas después de insertar una nueva
    if (isset($_SESSION['nueva_estadistica'])) {
        $_SESSION['estadisticas'][] = $_SESSION['nueva_estadistica']; // Agregar la nueva estadística a la lista
        unset($_SESSION['nueva_estadistica']); // Limpiar la variable de sesión para evitar inserciones duplicadas
    }
}
?>





