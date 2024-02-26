<?php
$errores = array();
$_SESSION['vista'] = VIEW.'matriculasView.php';

// Verificar si $_SESSION['Coche'] está definida
if (isset($_SESSION['Coche'])) {
    // Obtener el id del coche seleccionado
    $idChoche = $_SESSION['Coche']->id;

    // Obtener las matrículas asociadas al coche
    $matriculas = get("matricula/coche_id/".$idChoche);
    $matriculas = json_decode($matriculas, true);
    $_SESSION['matriculas'] = $matriculas;
} else {
    // Si $_SESSION['Coche'] no está definida, mostrar un mensaje de error
    echo "No se ha seleccionado ningún coche.";
}

$_SESSION['avisos'] = "";

if(validarFomInsertMatricula($errores)){
    if(isset($_REQUEST['insertar'])){
        // Insertar nueva matrícula
        $array = array("coche_id" => $idChoche, "matricula" => $_REQUEST['matricula']);
        post("matricula", $array);

        // Cargar matrículas actualizadas
        $matriculas = get("matricula/coche_id/".$idChoche);
        $matriculas = json_decode($matriculas, true);
        $_SESSION['matriculas'] = $matriculas;
        $_SESSION['avisos'] = "Matrícula insertada correctamente";
    } else {
        $errores['insertMatricula'] = "No se ha podido insertar la matrícula";
    }
}

if (isset($_REQUEST['borrar'])) {
    // Verificar si se ha definido el id de la matrícula a eliminar
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        // Eliminar la matrícula usando la API
        deleteFromAPI("matricula", $id); 
        // Actualizar la lista de matrículas después de eliminar
        $matriculas = get("matricula/coche_id/".$idChoche);
        $matriculas = json_decode($matriculas, true);
        $_SESSION['matriculas'] = $matriculas;
        $_SESSION['avisos'] = "Matrícula eliminada correctamente";
    } else {
        $errores['borrar'] = "No se ha seleccionado ninguna matrícula para eliminar";
    }
} else {
    $errores['borrar'] = "No se ha podido eliminar la matrícula";
}
?>




