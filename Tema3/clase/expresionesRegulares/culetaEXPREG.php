<?php

/*

Modificadores:
i: Insensible a mayúsculas/minúsculas.
m: Trata el string como múltiples líneas.
s: Hace que el punto (.) coincida también con saltos de línea.
u: Habilita el modo UTF-8.
g: Encuentra todas las coincidencias, no solo la primera.
Caracteres especiales:
.: Cualquier caracter excepto nueva línea.
^: Inicio de la cadena.
$: Fin de la cadena.
\: Escapar un carácter especial.

    Clases de caracteres:
    [abc]: Coincide con a, b o c.
    [^abc]: No coincide con a, b ni c.
    [a-z]: Coincide con cualquier letra minúscula.
    [A-Z]: Coincide con cualquier letra mayúscula.
    [0-9]: Coincide con cualquier dígito.

Cuantificadores:
*: 0 o más ocurrencias.
+: 1 o más ocurrencias.
?: 0 o 1 ocurrencia.
{n}: Exactamente n ocurrencias.
{n,}: Al menos n ocurrencias.
{n,m}: Entre n y m ocurrencias.

    Metacaracteres de posición:
    \b: Límite de palabra.
    \B: No es un límite de palabra.
    (?=...): Búsqueda hacia adelante.
    (?!...): Búsqueda hacia adelante negativa.

    Grupos y Capturas:
    (...): Grupo de captura.
    (?:...): Grupo de no captura.
    \1, \2, etc.: Retroreferencias.
    Caracteres especiales predefinidos:
    \d: Dígito (equivale a [0-9]).
    \D: No dígito.
    \w: Carácter de palabra (equivale a [a-zA-Z0-9_]).
    \W: No carácter de palabra.
    \s: Carácter de espacio en blanco.
    \S: No espacio en blanco.

Funciones principales de PHP:
preg_match($patrón, $cadena): Comprueba si el patrón aparece en la cadena.
preg_match_all($patrón, $cadena, $coincidencias): Encuentra todas las coincidencias.
preg_replace($patrón, $reemplazo, $cadena): Reemplaza las coincidencias.

EJEMPLO uso
*/

$patron = '/\b(\w+)\b/';

// en este caso \B es delimitador de palabra por ejmplo carri-coche no cuenta como palabra completa por el guion 
//(\w+) grupo para delimitar palabras aparece uno o mas (simbolo +)
// en este caso la expresion sirve para delimitar la primera palabra
$cadena = "Otorrino-laringolo super carry fragil listico";
if (preg_match($patron, $cadena, $coincidencias)) {
    echo "Coincidencia encontrada: " . $coincidencias[0];
}
