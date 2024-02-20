<h2>Intenta Adivinar la palabra</h2>
<form action="" method="post">
    <p>
        <label for="letraJuego">Introduce una letra</label>
        <input type="text" name="letraJuego" id="letraJuego" maxlength="1" placeholder="Introduce una letra">
        <input type="submit" value="Probar" name="botonIntento">
        <?php
        if (isset($errores)) {
            escribirErrores($errores, 'letraJuego');
        }
        ?>
    </p>
</form>

<div>
    <?php
    if (isset($_SESSION['palabra'])) {
        echo $_SESSION['palabra']->palabra;
        echo "<br>";
        echo "<label>Palabra oculta:</label>";

        $palabraSecreta = strtoupper($_SESSION['palabra']->palabra);
        $letraJuego = isset($_REQUEST['letraJuego']) ? strtoupper($_REQUEST['letraJuego']) : '';
        $intentoJuego = isset($_SESSION['intentoJuego']) ? $_SESSION['intentoJuego'] : ''; // Obtener las letras adivinadas hasta ahora

        // Mostrar la palabra oculta con espacios entre las letras
        for ($i = 0; $i < strlen($palabraSecreta); $i++) {
            $caracter = $palabraSecreta[$i];
            // Verificar si la letra ya ha sido adivinada
            if (strpos($intentoJuego, $caracter) !== false) {
                echo "<input type='text' value='" . $caracter . "' readonly>";
            } else {
                echo "<input type='text' value='x' readonly>";
            }
            echo " ";
        }
        echo "<br>";
        
        // Mostrar los intentos realizados y el total permitido
        $intentosRealizados = isset($_SESSION['intentos']) ? $_SESSION['intentos'] : 0;
        $intentosTotales = 6;
        echo "Intentos: $intentosRealizados/$intentosTotales";
    }
    ?>

    <p>
        <?
        print_r ($_SESSION['palabra']->id_palabra);
        ?>
    </p>
</div>


