<h2>Gestion de matriculas</h2>

<h3>
<?php
// Verificar si $_SESSION['Coche'] está definida
if (isset($_SESSION['Coche'])) {
    // Imprimir información del coche seleccionado
    echo "El coche seleccionado es: " . $_SESSION['Coche']->marca . " " . $_SESSION['Coche']->modelo;
    echo " con id " . $_SESSION['Coche']->id;
}
?>

</h3>
<p>
    <h3>Vincular Otra matricula a este coche</h3>
    <form action="" method="post">
    <input type="hidden" name="cocheId" value="<?php echo $_SESSION['Coche']->id; ?>">
    <label for="matricula">Matricula: <input type="text" name="matricula" id="matricula"></label>
    <input type="submit" name="insertar" value="Insertar">
    <p>
        <?php
        if (isset($errores)&& isset ($_REQUEST['insertar'])) {
            escribirErrores($errores, "matricula");
        }
        if(isset($errores['insertMatricula'])){
            echo '<span style="color: red;">' . $errores['insertMatricula'] . '</span>';
        }
        ?>
    </p>
    </form>
<p style="color:green">

<?
    if(isset($_SESSION['avisos'])){
        echo $_SESSION['avisos'];
    
    }
?>
</p>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>coche_id</th>
            <th>Matricula</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if (!empty($_SESSION['matriculas'])) { 
            foreach ($_SESSION['matriculas'] as $matricula) {
                echo "<tr>";
                echo "<td>".$matricula['id']."</td>";
                echo "<td>".$matricula['coche_id']."</td>";
                echo "<td>".$matricula['matricula']."</td>";
                echo "<form method='post'><input type='hidden' name='id' id='id' value='".$matricula['id']."'>";
                echo "<td><input type='submit' name='borrar' id='borrar' value='Eliminar'></td>";
                echo "</form></tr>";
            }
        } else {
            echo "No hay matriculas disponibles.";
        }
        ?>
    </tbody>
    <?
     if(isset($errores['borrar']) && isset($_REQUEST['borrar'])){
        echo '<span style="color: red;">' . $errores['borrar'] . '</span>';
    }
    ?>
</table>