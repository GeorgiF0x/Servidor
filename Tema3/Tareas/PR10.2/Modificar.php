<?php
    include("./validaciones.php");
    include("/var/www/Servidor/Fragmentos/header.html");
    // Recupera el índice del campo a modificar
    $indiceModificar = isset($_GET['indice']) ? $_GET['indice'] : null;
    actualizarDatosCSV("notas.csv");
?>

<!DOCTYPE html>
<html lang="es">

<body>

<h1 class="text text-center">Modificar Notas</h1>
<div class="container">
    <form action="" method="post" class="mt-5 text-center mx-5 just" enctype="multipart/form-data">
        <table class="table border">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">1º EV</th>
                    <th scope="col">2º Ev</th>
                    <th scope="col">3º Ev</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $fp = fopen("notas.csv", "r");
                    $conta = 1;
                    while ($ArrayDatos = fgetcsv($fp, filesize("notas.csv"), ";")) {
                        echo "<tr>";
                        foreach ($ArrayDatos as $key => $value) {
                            if ($conta == 1) {
                                // El primer elemento no es editable
                                echo "<td>$value</td>";
                            } else {
                                // Los demás elementos son editables
                                echo "<td><input type='text' name='campo_$key' value='$value'></td>";
                            }
                        }
                        echo "</tr>";
                        $conta++;
                    }
                    fclose($fp);
                ?>
            </tbody>
        </table>
        <input class='btn btn-dark' type='submit' name='guardar' value='Guardar cambios'>
    </form>
</div>

</body>
</html>
