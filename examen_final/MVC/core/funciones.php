<?
function validarFormulario(&$errores)
{


    if (isset($_REQUEST['nombre'])) {
        comNombre($errores);
    }
    if (isset($_REQUEST['token'])) {
        comToken($errores);
    }


    if (count($errores) == 0) {
        return true;
    } else
        return false;

}

function validarRegistro(&$errores)
{


    if (isset($_REQUEST['Email'])) {
        comNombre($errores);
    }



    if (count($errores) == 0) {
        return true;
    } else
        return false;

}


function compEmail(&$erroes){
    
    if (textoVacio('email')) {
        $errores['email'] = "este campo esta vacio";
    }
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
function comToken(&$errores)
{
    if (textoVacio('token')) {
        $errores['token'] = "este campo esta vacio";
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
function admin()
{
    if ($_SESSION['usuario']->perfil === 'administrador') {
        return true;
    }
    return false;

}

function generarToken(){
    $token="";
    for ($i=0; $i<33; $i++) { 

        $d=rand(1,30)%2; 
        $token.= $d ? chr(rand(65,122)) : chr(rand(48,57)); 
    }
    return $token;
    
}

function comprobarCaducado($fecha){
    $fecha_caducada= date("Y-m-d H:i:s",strtotime("-10 days")); 

    $msToken=time($fecha);
    $msCaducados=time($fecha_caducada);
    if($msToken<$msCaducados){
        return false;
    }else{
        return true;
    }
}










