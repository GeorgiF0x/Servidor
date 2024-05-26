<?php

$idAlbaran=$_REQUEST['id_albaran'];
$detalleAlbaran=get("detalleAlbaranes?IdAlbaran=".$idAlbaran);
$detalleAlbaran = json_decode($detalleAlbaran);
// print_r($detalleAlbaran);
$_SESSION['detalle_albaran']=$detalleAlbaran;