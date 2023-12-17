<?

require_once ('/var/www/Servidor/Tema4/Tareas/PR13/configBD.php');



function imprimir(){
    $DSN = 'pgsql:host=' . IP . ';dbname=gym';
    try {
        $con = new PDO($DSN, USER, PASS);

        $sql = 'SELECT * FROM ejercicios';
        $result = $con->query($sql);

        echo '<table class="table table-bordered">';
        echo '<thead class="thead-dark">'; 
        echo '<tr><th>ID</th><th>Ejercicio</th><th>Repeticiones</th><th>Series</th><th>Modificar</th><th>Eliminar</th></tr>';
        echo '</thead>';
        echo '<tbody>';


        while ($array = $result->fetch(PDO::FETCH_ASSOC)){
            echo '<tr>';
            $id = '';
            $ejercicio = '';
            $repeticiones = 0;
            $series = 0;

            foreach ($array as $key => $value) {
                echo '<td>'.$value.'</td>';
                if ($key == 'id') $id = $value;
                if ($key == 'ejercicio') $ejercicio = $value;
                if ($key == 'repeticiones') $repeticiones = $value;
                if ($key == 'series') $series = $value;
            }

            //Modificar
            echo '<td>';
            echo '<form action="./modificar.php" method="get">';
            echo '<button class="btn btn-primary" type="submit" name="modificar">Modificar</button>';
            echo '<input type="hidden" name="id" value="' . $id . '">';
            echo '<input type="hidden" name="ejercicio" value="' . $ejercicio . '">';
            echo '<input type="hidden" name="repeticiones" value="' . $repeticiones . '">';
            echo '<input type="hidden" name="series" value="' . $series . '">';
            echo '</form>';
            echo '</td>';

            //Borrar
            echo '<td>';
            echo '<form action="#" method="get">';
            echo '<button class="btn btn-danger" type="submit" name="eliminar">Eliminar</button>';
            echo '<input type="hidden" name="id" value="' . $id . '">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } catch (PDOException $e) {
        switch ($e->getCode()){
            case 0:
                echo "No encuentra todos los parámetros de la secuencia. <br> Prueba a crear la base de datos.";
                echo '
                <div class="container mt-3>
                <form action="" method="get"><input name = "crear" type="submit" value="Crear Tabla" class="btn btn-sucess">  </form>
                </div>
                ';
        
                break;
            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;
            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;
            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                        //Crear boton para cargar Script
                        echo '<form action="" method="get"><input name = "crear" type="submit" value="Crear Base de datos" class="btn btn-success">  </form>';
        
                break;
                case '7':
                    echo "La base de datos  no existe
                    <br>";
                    // Crear boton para cargar Script
              
                    break;
               
            case 1146:
                echo "Error al encontrar la tabla indicada";
                //Crear boton para cargar Script
             
                break;
            case 1064:
                echo "No se han indicado los valores a insertar en la BD";
                break;
                case '42P01':
                echo "Tabla no definida";
                    //Crear boton para cargar Script
                  
                    break;
                case'42P04':
                echo "La base de datos no existe <br>";
                    // Llamar a la función ejecutarScript solo si la base de datos no existe
                    ejecutarScript();
                break;
            default:
                echo "Error no identificado: " . $th->getMessage();
                echo 'Codigo: ' .$th->getCode();
                
        }        
    } finally {
        $con = null; // Cerrar la conexión de manera segura
    }
}

function ejecutarScript(){
        $DSN = 'pgsql:host=' . IP . ';dbname=postgres';  //conectamos una base de datos existente
        try {
            
            $con = new PDO($DSN, USER, PASS);
            $sql = 'create database gym';
            $result = $con->exec($sql);
            //Ejecuta el script
            $DSN = 'pgsql:host=' . IP . ';dbname=gym';//conectamos a la base de datos creada
            $con = new PDO($DSN, USER, PASS);
            $script = file_get_contents('/var/www/Servidor/Tema4/Tareas/PR13/script.sql');
            $result = $con-> exec($script);

          echo 'Script ejecutado. Pruebe su lectura.';
    } catch (PDOException $e) {
        switch ($e->getCode()){
            case 0:
                echo "No encuentra todos los parámetros de la secuencia";
                break;
            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;
            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;
            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                break;
            case 1146:
                echo "Error al encontrar la tabla indicada";
                break;
            case 1064:
                echo "No se han indicado los valores a insertar en la BD";
                break;
            default:
                echo "Error no identificado : " . $e->getMessage();      
        }
    } finally {
        unset($con);
    }
}

function crearTabla(){
    try {
        $con = new PDO($DSN, USER, PASS);
        $DSN = 'pgsql:host=' . IP . ';dbname=gym';//conectamos a la base de datos creada
        $con = new PDO($DSN, USER, PASS);
        $script = file_get_contents('/var/www/Servidor/Tema4/Tareas/PR13/script.sql');
        $result = $con-> exec($script);

      echo 'Script ejecutado. Pruebe su lectura.';
} catch (PDOException $e) {
    switch ($e->getCode()){
        case 0:
            echo "No encuentra todos los parámetros de la secuencia";
            break;
        case 2002:
            echo "La IP de acceso a la BD es incorrecta";
            break;
        case 1045:
            echo "Usuario o contraseña incorrectos";
            break;
        case 1049:
            echo "Error al conectarse a la base de datos indicada";
            break;
        case 1146:
            echo "Error al encontrar la tabla indicada";
            break;
        case 1064:
            echo "No se han indicado los valores a insertar en la BD";
            break;
        default:
            echo "Error no identificado : " . $e->getMessage();      
    }
} finally {
    unset($con);
}
}






