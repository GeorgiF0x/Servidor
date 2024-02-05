<?
require('./controllers/Base.php');
require('./controllers/InstitutosController.php');
// echo '<pre>';
// print_r($_SERVER);
if (isset($_SERVER['PATH_INFO'])) {
    $recurso = Base::divideUri($_SERVER['PATH_INFO']);
    if ($recurso[1] === 'institutos') {
        InstitutosController::institutos();
    } else {


    }
    // print_r($recurso);
} else {
    Base::response("HTTP/1.0 404 Direccion incorrecta");
}
