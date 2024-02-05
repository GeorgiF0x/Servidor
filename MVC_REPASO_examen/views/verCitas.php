<h2>Tabla de Citas</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Especialista</th>
            <th>Motivo</th>
            <th>Fecha</th>
            <th>Activo</th>
            <th>Paciente</th>

            <th>Funciones</th>
        </tr>
    </thead>

    <tbody>
        <?php
        if (isset($array_cita)) {

            foreach ($array_cita as $cita) {
                echo "<tr>";
                echo "<td>{$cita->id}</td>";
                echo "<td>{$cita->especialista}</td>";
                echo "<td>{$cita->motivo}</td>";
                echo "<td>{$cita->fecha}</td>";
                echo "<td>{$cita->activo}</td>";
                echo "<td>{$cita->paciente}</td>";
                echo "<td>    <form action='' method='post'><label for=''><input type='submit' value='Ver' name='Ver'><input type='hidden' value='$cita->id' name='oculto'></label></form></td>";
                echo "</tr>";
            }    # code...
        }

        ?>
    </tbody>
</table>
<form action="" method="post">
    <label for=""><input type="submit" value="PedirCita" name="PedirCita"></label>
    <label for=""><input type="submit" value="CitasAnteriores" name="CitasAnteriores"></label>
</form>