<?
require('curl.php');
require('confiApi.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista de institutos</h1>
    <table>

        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Localidad</th>
            <th>Telefono</th>
        </thead>

        <tbody>

            <?php
            $institutos = get('institutos');
            $institutos = json_decode($institutos, true);
            foreach ($institutos as $insti) {
                echo '<tr>';
                echo '<td>' . $insti['id'] . '</td>';
                echo '<td>' . $insti['nombre'] . '</td>';
                echo '<td>' . $insti['localidad'] . '</td>';
                echo '<td>' . $insti['telefono'] . '</td>';

                echo '</tr>';
            }
            ?>
        </tbody>

    </table>
</body>

</html>