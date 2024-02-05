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
    if (isset($_REQUEST['codUsuarior'])) {
        comCodir($errores);
    }
    if (isset($_REQUEST['descUsuarior'])) {
        comNombrer($errores);
    }
    if (isset($_REQUEST['passr'])) {
        comcontrar($errores);
    }

    if (count($errores) == 0) {
        return true;
    } else
        return false;

}
function comNombrer(&$errores)
{
    if (textoVacio('descUsuarior')) {
        $errores['descUsuarior'] = "este campo esta vacio";
    }
    // } elseif (!preg_match('/^[a-zA-Z]{3,}$/', $_REQUEST['nombre'])) {
    //     $errores['nombre'] = "combinacion incorrecta";
    // }
}
function comCodir(&$errores)
{

    if (textoVacio('codUsuarior')) {
        $errores['codUsuarior'] = "este campo esta vacio";
    }
    // } elseif (!preg_match('/^[a-zA-Z]{3,}$/', $_REQUEST['nombre'])) {
    //     $errores['nombre'] = "combinacion incorrecta";
    // }
}
function comcontrar(&$errores)
{
    if (textoVacio('passr')) {
        $errores['passr'] = "este campo esta vacio";
    }
    // } elseif (!preg_match('/^[a-zA-Z]{3,}$/', $_REQUEST['nombre'])) {
    //     $errores['nombre'] = "combinacion incorrecta";
    // }
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
function admin()
{
    if ($_SESSION['usuario']->perfil === 'administrador') {
        return true;
    }
    return false;

}
