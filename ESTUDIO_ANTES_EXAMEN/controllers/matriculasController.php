<?
$_SESSION['vista'] = VIEW.'matriculasView.php';
    
$idChoche = $_POST['cocheId'];
$matriculas = get("matricula/coche_id/".$idChoche);
$matriculas = json_decode($matriculas, true);
$_SESSION['matriculas'] = $matriculas;
$_SESSION['Coche'] = CochesDao::getById($idChoche);

$_SESSION['avisos'] = "";

if(isset($_REQUEST['insertarMatricula'])){
    $array = array("coche_id"=>$idChoche,"matricula"=>$_REQUEST['matricula']);
    echo"<pre>";
    print_r($array);
    // post("matricula",$array);
}


