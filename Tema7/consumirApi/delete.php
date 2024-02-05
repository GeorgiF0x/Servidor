<?php
require './curl.php';
require './confApi.php';

if (isset($_REQUEST['borrar'])){
  
delete('institutos', $_REQUEST['id']);
}

?>


<h1>borrar</h1>
<form action="" method="post">
    <label for="id"><input type="text" name="id">id</label><br>
    <input type="submit" value="borrar" name="borrar">
</form>

<a href="./">Volver</a>