<div class="container">
    <h1>Selecciona los números que desees</h1>
    <form method="post" action="">
        <div class="row row-cols-5 g-3">
            <?php
            for ($i = 1; $i <= 50; $i++) {
            ?>
                <div class="col">
                    <div class='form-check'>
                        <input class='form-check-input' type='checkbox' name='number[]' value='<?php echo $i; ?>' id='checkbox_<?php echo $i; ?>'>
                        <label class='form-check-label' for='checkbox_<?php echo $i; ?>'><?php echo $i; ?></label>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <?php
        // Llama a la función escribirErrores() para imprimir los errores
        if (isset($errores['number'])) {
            echo "<p class='text-danger'>" . $errores['number'] . "</p>";
        }
        ?>
        <button type="submit" class="btn btn-primary" name="Enviar_checks">Enviar</button>
    </form>
</div>


