<?php
//para validar input text
function textVacio($name)
{
    if (empty($_REQUEST[$name])) {
        return true;
    }
    return false;
}

function FileVacio($name)
{
    if (empty($FILE[$name]['name'])) {
        return true;
    }
    return false;
}
//para validar Radio buttons
function radioVacio($name)
{
    if (isset($_REQUEST[$name])) {
        return false;
    }
    return true;
}

function selectVacio($name)
{
    if (isset($_REQUEST[$name]) && $_REQUEST[$name] != 0) {
        return false;
    }
    return true;
}
//para  comprobar si se ha enviado
function enviado()
{
    if (isset($_REQUEST['Enviar'])) {
        return true;
    }
    return false;
}
//para comprobar si esta en el array de errores antes de validar 
function errores($errores, $name)
{
    if (isset($errores[$name])) {
        echo $errores[$name];
    }
}
//para que al enviar se guarden los campos rellenos 
function recuerda($name)
{
    if (enviado() && !empty($_REQUEST[$name])) {
        echo $_REQUEST[$name];
    } else if (isset($_REQUEST['borrar'])) {
        echo "";
    }
}
//para guardar los campos radio rellenos
function recuerdaRadio($name, $value)
{
    if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value) {
        echo "checked";
    } else if (isset($_REQUEST['borrar'])) {
        echo "";
    }
}

//para recordar CheckBox
function recuerdaCheckBox($name, $value)
{
    if (enviado() && isset($_REQUEST[$name]) &&  in_array($value, $_REQUEST[$name])) {
        echo "checked";
    } else if (isset($_REQUEST['borrar'])) {
        echo " ";
    }
}
//recuerda selects
function recuerdaSelect($name, $value)
{
    if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value) {
        echo "selected";
    } else if (isset($_REQUEST['borrar'])) {
        echo "";
    }
}

//comprobar si la fecha es mayor de 18
function comprobarEdad($name)
{
    if (enviado() && isset($_REQUEST[$name])) {
        $fechaNacimiento = new DateTime($_REQUEST[$name]);
        $hoy = new DateTime();
        $diferencia = $fechaNacimiento->diff($hoy);

        if ($diferencia->y < 18) {
            echo "Es menor de 18 años.";
        } else {
            echo "Es mayor de 18 años.";
        }
    }
}

//funciones para validar y calcular letra de dni 

function comprobarLetraDNI($dni)
{
    $letrasValidas = "TRWAGMYFPDXBNJZSQVHLCKE";
    $dniSinLetra = substr($dni, 0, 8);
    $letraProporcionada = strtoupper(substr($dni, 8, 1));
    $letraCalculada = $letrasValidas[$dniSinLetra % 23];

    return $letraProporcionada === $letraCalculada;
}



//valida formulario
function validarFormulario(&$errores)
{

    if (textVacio('Nombre')) {
        $errores['Nombre'] = "Nombre esta vacio->";
    } elseif (!preg_match('/^[A-Za-z ]{3,}$/', $_REQUEST['Nombre'])) {
        $errores['Nombre'] = "Nombre no cumple el patron -> ";
    }
    if (textVacio('Apellido')) {
        $errores['Apellido'] = "Apellido esta Vacio->";
    } elseif (!preg_match('/^[A-Za-z ]{3,}\s[A-Za-z ]{3,}$/', $_REQUEST['Apellido'])) {
        $errores['Apellido'] = "Apellido no cumple el patron -> ";
    }
    if (textVacio('Contraseña')) {
        $errores['Contraseña'] = "Contraseña está vacía -> ";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/', $_REQUEST['Contraseña'])) {
        $errores['Contraseña'] = "Contraseña no tiene el formato del patron -> ";
    } elseif ($_REQUEST['Contraseña'] !== $_REQUEST['repContraseña']) {
        $errores['repContraseña'] = "Las contraseñas no coinciden -> ";
    }
    if (textVacio('repContraseña')) {
        $errores['repContraseña'] = "Repetir contraseña Vacio-> ";
    }
    if (textVacio('Fecha')) {
        $errores['Fecha'] = "Fecha está vacía -> ";
    } elseif (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $_REQUEST['Fecha'])) {
        $errores['Fecha'] = "Formato de fecha no válido -> ";
    }
    if (textVacio('DNI')) {
        $errores['DNI'] = "DNI está vacío -> ";
    } elseif (!preg_match('/^\d{8}[A-Za-z]?$/', $_REQUEST['DNI'])) {
        $errores['DNI'] = "Formato de DNI no válido -> ";
    } elseif (!comprobarLetraDNI($_REQUEST['DNI'])) {
        $errores['DNI'] = "La letra del DNI es incorrecta -> ";
    }
    if (textVacio('Email')) {
        $errores['Email'] = "Email está vacío -> ";
    } elseif (!preg_match('/^.+@.+\..{2,}$/', $_REQUEST['Email'])) {
        $errores['Email'] = "El formato del email no es válido -> ";
    }
    if (FileVacio('Fichero')) {
        $errores['Fichero'] = "No has seleccionado un fichero -> ";
    } elseif (!preg_match('/\.(jpg|jpeg|png|bmp)$/i', $_FILES['Fichero']['name'])) { //i para que sean mayusculas o minusculas 
        $errores['Fichero'] = "El formato del fichero no es válido. Sube un fichero jpg, jpeg, png o bmp -> ";
    } elseif (count($_FILES) != 0) {
        echo "<pre>";
        print_r($_FILES);

        // Ruta para guardar el fichero
        $ruta = "/var/www/Servidor/Tema3/Tareas/PR09/";
        $ruta .= basename($_FILES['Fichero']['name']);

        if (move_uploaded_file($_FILES['Fichero']['tmp_name'], $ruta)) {
            echo "Archivo subido";
        } else {
            echo "Ha fallado al subir el archivo";
        }
    }
    if (count($errores) == 0) {
        return true;
    } else {
        return false;
    }
}






// if(count($_FILES) != 0) {
//     echo "<pre>";
//     print_r($_FILES);
    
//     // Ruta para guardar el fichero
//     $ruta = "/var/www/Servidor/Tema3/Tareas/PR09/";
//     $ruta .= basename($_FILES['Fichero']['name']);
    
//     if(move_uploaded_file($_FILES['Fichero']['tmp_name'], $ruta)) {
//         echo "Archivo subido";
//     } else {
//         echo "Ha fallado al subir el archivo";
//     }
// }

    //subir varios Ficheros 
    // $numFichero=count($_FILES);
    
    // for ($i=0; $i <=$numFichero ; $i++) { 
    //     $ruta.=basename($_FILES['Fichero']['name'][$i]);
    //     if(move_uploaded_file($_FILES['Fichero']['tmp_name'][$i],$ruta)){
    //         echo "archivo subido";
    //         echo "<pre>";
    //         print_r($_FILES);
    //     }else{
    //     echo "fallo al subir los Ficheros";
    //     pintarBr(); 
    // }
