<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos adicionales para ajustar el diseño */
        .div {
            margin: 20px auto;
            width: 80%;
        }
    </style>
</head>

<body>
    <div class="container">

        <form method="post">
            <div class="row row-cols-5 g-3">
                <div class="col">
                    <?php
                    for ($i = 1; $i <= 50; $i++) {
                        echo "<div class='form-check'>";
                        echo "<input class='form-check-input' type='checkbox' name='number[]' value='$i' id='checkbox_$i'>";
                        echo "<label class='form-check-label' for='checkbox_$i'>$i</label>";
                        echo "</div>";
                    }
                    if (isset($errores)) {
                        escribirErrores($errores, "validado");
                    }
                    ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="Enviar_checks">Enviar</button>
            <?php
              
            ?>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>