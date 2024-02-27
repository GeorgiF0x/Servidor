<?php
$coches=get("coches");
$coches = json_decode($coches, true);
$_SESSION['coches']=$coches;

if(isset($_REQUEST['buscar'])){
    
    $_SESSION['coches'] = get("coches/".$_REQUEST['filtro']);
}

