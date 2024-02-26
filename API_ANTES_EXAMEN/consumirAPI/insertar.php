<?php 
require("curl.php");
require("configurarAPI.php");

    if(isset($_REQUEST['insertar'])){
        $array = array("coche_id" =>$_REQUEST['coche_id'],
        "matricula"=>$_REQUEST['matricula']);
        post("matricula",$array);
    }

?>

<form action="" method="post">
    <label for="coche_id">Coche_id: <input type="text" name="coche_id" id="coche_id"></label><br>
    <label for="matricula">Matricula: <input type="text" name="matricula" id="matricula"></label><br>
    <input type="submit" name="insertar" id="insertar">
</form>