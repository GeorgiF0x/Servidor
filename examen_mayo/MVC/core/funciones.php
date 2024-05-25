<?
function validarFormulario(&$errores)
{
    # code...
    if (isset($_REQUEST['nombre'])) {
        comNombre($errores);
    }
    if (isset($_REQUEST['pass'])) {
        comcontra($errores);
    }


    if (count($errores) == 0) {
        return true;
    } else
        return false;

}



function validarFormUpdate(&$errores){
    if(isset($_REQUEST['nuevo_jugador1'])){
        compJug1($errores);
    }
    if(isset($_REQUEST['nuevo_jugador2'])){
        compJug2($errores);
    }
    if(isset($_REQUEST['nueva_fecha'])){
        compFecha($errores);
    }
    if(isset($_REQUEST['nuevo_resultado'])){
        compResultado($errores);
    }
    

    if (count($errores) == 0) {
        return true;
    } else {
        return false;
    }
    

}
function validarFormPost(&$errores){
    if(isset($_REQUEST['add_jugador1'])){
        compAddJug1($errores);
    }
    if(isset($_REQUEST['add_jugador2'])){
        compAddJug2($errores);
    }
    if(isset($_REQUEST['add_fecha'])){
        compAddFecha($errores);
    }
    if(isset($_REQUEST['add_resultado'])){
        compAddResultado($errores);
    }
    

    if (count($errores) == 0) {
        return true;
    } else {
        return false;
    }
    

}





function compJug1(&$errores){
    if(textoVacio('nuevo_jugador1')){
        $errores['nuevo_jugador1'] = "  jugador 1 esta vacio";
        return false;
    }
    return true;
}

function compAddJug1(&$errores){
    if(textoVacio('add_jugador1')){
        $errores['add_jugador1'] = "  jugador 1 esta vacio";
        return false;
    }
    return true;
}
function compJug2(&$errores){
    if(textoVacio('nuevo_jugador2')){
        $errores['nuevo_jugador2'] = " Jugador 2 esta vacio";
        return false;
    }
    return true;
}
function compAddJug2(&$errores){
    if(textoVacio('add_jugador2')){
        $errores['add_jugador2'] = " Jugador 2 esta vacio";
        return false;
    }
    return true;
}

function compResultado(&$errores){
    if(textoVacio('nuevo_resultado')){
        $errores['nuevo_resultado'] = " Resultado  esta vacio";
        return false;
    }
    return true;
}
function compAddResultado(&$errores){
    if(textoVacio('add_resultado')){
        $errores['add_resultado'] = " Resultado  esta vacio";
        return false;
    }
    return true;
}

function compFecha(&$errores){
    if(textoVacio('nueva_fecha')){
        $errores['nueva_fecha'] = " Nueva Fecha esta vacio";
        return false;
    }
    return true;
}

function compAddFecha(&$errores){
    if(textoVacio('add_fecha')){
        $errores['add_fecha'] = " Nueva Fecha esta vacio";
        return false;
    }
    return true;
}



function textovacio($name)
{
    if (empty($_REQUEST[$name])) {
        return true;
    }
    return false;
}
function comNombre(&$errores)
{
    if (textoVacio('nombre')) {
        $errores['nombre'] = "este campo esta vacio";
    }
    // } elseif (!preg_match('/^[a-zA-Z]{3,}$/', $_REQUEST['nombre'])) {
    //     $errores['nombre'] = "combinacion incorrecta";
    // }
}
function comcontra(&$errores)
{
    if (textoVacio('pass')) {
        $errores['pass'] = "este campo esta vacio";
    }
    // } elseif (!preg_match('/^\w{3,}\s+\w{3,}$/', $_REQUEST['apellido'])) {
    //     $errores['apellido'] = "combinacion incorrecta";
    // }
}


function escribirErrores($errores, $name)
{

    if (isset($errores[$name])) {
        echo '<span style="color: red;">' . $errores[$name] . '</span>';
    }
}
function validado()
{
    if (isset($_SESSION['usuario']))
        return true;
    else
        return false;
}










