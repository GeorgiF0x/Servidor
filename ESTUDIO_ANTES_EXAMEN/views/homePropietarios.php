<h1>Area de propietario</h1>

<form action="" method="post">
    <p>
        <input type="submit" value="Añadir Nuevo Coche" name="addCoche">
    </p>
</form>

<?php
// Verificar si $_SESSION['coches'] está definida y no está vacía
if (isset($_SESSION['coches']) && !empty($_SESSION['coches'])) {
?>
    <table>
        <thead>
            <th>Id</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Color</th>
            <th>Precio</th>
            <th>Ver Matrículas</th> 
        </thead>
        <tbody>
        <?php
        foreach ($_SESSION['coches'] as $coche) {
            echo "<tr>";
            echo "<td>" . $coche->id . "</td>";
            echo "<td>" . $coche->marca . "</td>";
            echo "<td>" . $coche->modelo . "</td>";
            echo "<td>" . $coche->anio . "</td>";
            echo "<td>" . $coche->color . "</td>";
            echo "<td>" . $coche->precio . "</td>";
            echo "<td>
                    <form action='' method='post'>
                        <input type='hidden' name='cocheId' value='" . $coche->id . "'>
                        <input type='submit' value='Ver Matrículas' name='verMatriculas'>
                    </form>
                </td>";
            // Botón para eliminar el coche
            echo "<td>
                    <form action='' method='post'>
                        <input type='hidden' name='cocheId' value='" . $coche->id . "'>
                        <input type='submit' value='Eliminar Coche' name='eliminarCoche'>
                    </form>
                </td>";
            echo "</tr>";
        }
    ?>

        </tbody>
    </table>
<?php
} else {
    ?>
    <form action="" method="post">
        <p>
            <input type="submit" value="Mostrar Coches" name="verCoches">
        </p>
    </form>
<?php
}

?>



