<?
if(isset($_SESSION['controller'])){
    require($_SESSION['controller']);
}

if($_SESSION['vista'] = VIEW.'homePartida.php'){
    $_SESSION['controller'] = CON.'PartidaController.php';
}
?>

<h4>
    Bienvenido al Juego del Ahorcado!
</h4>

<br>

<form action="" method="post">
    <input type="submit" value="Iniciar Partida aleatoria" name="Iniciar_Partida_Aleat">
    <br>
    <label for="minimo_letras">Mínimo de letras: 
        <input type="text" name="minimo_letras" id="minimo_letras">
    </label>
    <input type="submit" value="Iniciar Partida Min" name="Iniciar_Partida_Min">
</form>
<table>
    <thead>
        <th>Id</th>
        <th>Id</th>
        <th>Palabra</th>
        <th>Resultado</th>
        <th>Intentos</th>
        <th>Fecha</th>
    </thead>
    <tbody>
        <?
        if ($_SESSION['estadisticas']) {
            foreach ($_SESSION['estadisticas'] as $key => $value) {
                echo "<tr>";
                echo "<td>". $_SESSION['estadisticas'][$key]->id_estadistica ."</td>";
                echo "<td>". $_SESSION['estadisticas'][$key]->id_usuario ."</td>";
                echo "<td>". $_SESSION['estadisticas'][$key]->id_palabra ."</td>";
                echo "<td>". $_SESSION['estadisticas'][$key]->resultado ."</td>";
                echo "<td>". $_SESSION['estadisticas'][$key]->intentos ."</td>";
                echo "<td>". $_SESSION['estadisticas'][$key]->fecha ."</td>";
                echo "</tr>";
            }
        } else {
            exit('Error');
        }
        ?>
    </tbody>
</table>