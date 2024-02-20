<h2>Intenta Adivinar la palabra</h2>
<form>
    <p>
        <label for="palabraJuego">Introduce la palabra</label>
        <input type="text" name="palabraJuego" id="" placeholder="introduce una palabra para adivinar la secreta">
        <input type="submit" value="Probar" name="botonIntento">
    </p>
</form>

<div>
    <?php
        // $array_palabraOculta=str_split($_SESSION['palabra']);
        // foreach ($array_palabraOculta as $key => $value) {
        //     if($_SESSION['intentos'])<
        // };
        print_r( $_SESSION['palabra']->palabra);
        echo "<br>";
        if(isset($_SESSION['intentoJuego'])){} echo $_SESSION['intentoJuego'];

    ?>
</div>