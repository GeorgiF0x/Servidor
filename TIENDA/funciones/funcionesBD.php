<?php

require ("configBD.php");


function verificarBDD()
{
    try {
        $conexion = mysqli_connect(IP, USER, PASS, "");

        if ($conexion) {
            $result = $conexion->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'Tienda'");

            if ($result->num_rows === 0) {
                $script = file_get_contents("script.sql");

                if ($conexion->multi_query($script)) {
                    echo "Base de datos 'Tienda' creada con éxito.";
                } else {
                    echo "Error al ejecutar el script: " . $conexion->error;
                }
            } else {
                echo "La base de datos 'Tienda' ya existe, no es necesario ejecutar el script.";
            }

            $conexion->close();
        } else {
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        // Según códigos de error
        switch ($th->getCode()) {
            case 1044:
                echo "Error al acceder a la BD: Acceso denegado.";
                break;
            case 1045:
                echo "Error al conectarse a la BD: Acceso denegado para el usuario.";
                break;
            case 1050:
                echo "Error al crear la BD: Ya existe una base de datos con el mismo nombre.";
                break;
            case 1054:
                echo "Error de sintaxis en la consulta SQL.";
                break;
            case 1062:
                echo "Error al insertar datos: Duplicado de clave única.";
                break;
            case 1064:
                echo "Error de sintaxis en la consulta SQL.";
                break;
            case 1146:
                echo "Error al acceder a la tabla: No existe la tabla especificada.";
                break;
            case 2002:
                echo "Error al conectar al servidor MySQL: No se puede establecer conexión.";
                break;
            default:
                // Otros códigos de error
                echo "Error desconocido: " . $th->getMessage();
                break;
        }
    }
}

// Llamada a la función para verificar y crear la base de datos si es necesario
verificarBDD();
?>











