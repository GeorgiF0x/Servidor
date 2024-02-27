<?php
$errores = array();
$_SESSION['vista'] = VIEW.'matriculasView.php';
$_SESSION['idCoche'] = $_REQUEST['cocheId'];
$idCoche= $_SESSION['idCoche'];
$_SESSION['avisos'] = "";
$_SESSION['Coche']=CochesDao::getById($idCoche);

// echo"<pre>";
// print_r($_SESSION['coche']);

    // Obtener las matrículas asociadas al coche
    $matriculas = get("matricula/coche_id/".$idCoche);
    $matriculas = json_decode($matriculas, true);
    $_SESSION['matriculas'] = $matriculas;




if(validarFomInsertMatricula($errores)){
    if(isset($_REQUEST['insertar'])){
        // Insertar nueva matrícula
        $array = array("coche_id" => $idCoche, "matricula" => $_REQUEST['matricula']);
        post("matricula", $array);

        // Cargar matrículas actualizadas
        $matriculas = get("matricula/coche_id/".$idCoche);
        $matriculas = json_decode($matriculas, true);
        $_SESSION['matriculas'] = $matriculas;
        $_SESSION['avisos'] = "Matrícula insertada correctamente";
    } else {
        $errores['insertMatricula'] = "No se ha podido insertar la matrícula";
    }
}

if (isset($_REQUEST['borrar'])) {
    $idMatricula = $_REQUEST['id'];
    eliminarMatricula($idMatricula,$idCoche);
} else {
    $errores['borrar'] = "No se ha podido eliminar la matrícula";
}
?>




