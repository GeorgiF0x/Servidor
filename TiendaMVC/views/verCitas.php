
    <h1>Listado de Citas</h1>



<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <?
      if(isAdmin()){
        echo '<th scope="col">Paciente</th>';
      }
      ?>
      <th scope="col">Especialista</th>
      <th scope="col">Motivo</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody>
<?
foreach ($array_citas as $cita) {
  echo "<tr>";
  echo "<form action=''>";
  echo '<input type="hidden" name="id">';
  if(isAdmin()){
    echo '<td>'.$cita->paciente."</td>";
  }
  echo '<td>'.$cita->Especialista."</td>";
  echo '<td>'.$cita->fecha."</td>";
  echo '<td><button type="submit" class="btn btn-primary" name="ver">Ver</button></td>';
  echo '<td><button type="submit" class="btn btn-danger" name="cancelar">Cancelar</button></td>';
  echo '</form>';
  echo '</tr>';
}
?>
  </tbody>
</table>

<form action="" method="post" class="mb-2 mt-3">
  <input type="submit" value="Pedir Cita" name="add_cita" class="btn btn-success">
  <input type="submit" value="Ver Cita anterior" name="cita_anterior" class="btn btn-success">
  <?
    if(isAdmin()){
      ?>
      <form action="" method="post">
        <label for="nombrePaciente">CodigoPaciente:</label>
        <input type="text" name="cod_paciente" id="nombrePaciente">
        <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'cod_paciente'); ?>
    <p>
    <br>
        <input type="submit" value="Ver Citas De paciente" name="ver_cita_paciente" class="btn btn-success">
      </form>
      <?
    }
  ?>
</form>
