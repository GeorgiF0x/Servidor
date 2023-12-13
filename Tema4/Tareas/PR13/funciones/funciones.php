<?

require_once ('/var/www/Servidor/Tema4/Tareas/PR13/configBD.php');


function leerTodoCampo($nomCampo,$nomTabla){
    $DSN = 'pgsql:host='.IP.';dbname=gym';
    $con= new PDO($DSN,USER,PASS);
    $sql="select".$nomCampo." from". $nomTabla;
    $result=$con->query($sql);
    while($row=$result->fetch(PDO::FETCH_BOTH)){ 
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>";
    }
}

function imprimirTodo(){
    $DSN = 'pgsql:host='.IP.';dbname=gym';
    $con= new PDO($DSN,USER,PASS); 
    $sql="select * from ejercicios";
    $result=$con->query($sql);
    while($row=$result->fetch(PDO::FETCH_BOTH)){ 
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>";
    }
}

function InsertarPreparada($valor1,$valor2,$valor3){
    $DSN = 'pgsql:host='.IP.';dbname=gym';
    $con= new PDO($DSN,USER,PASS);
    $sql="insert into tiempo (ejercicio,repeticiones,series) values (?,?,?)";
    $stmt=$con->prepare($sql);
    $stmt->execute(array($valor1,$valor2,$valor3));  
}

function Borrar($Condicion,$nomTabla){
    $DSN = 'pgsql:host='.IP.';dbname=gym';
    $con= new PDO($DSN,USER,PASS);
    $sql="delete from". $nomTabla."where".$nomTabla.$Condicion;
    $result=$con->exec($sql);
}

function selectWhere($valor,$condicion,$tabla){
    $DSN = 'pgsql:host='.IP.';dbname=gym';
    $con= new PDO($DSN,USER,PASS);
    $sql="select".$valor."from".$tabla."where".$valor.$condicion;
    $result=$con->exec($sql);
}

function update($nomTabla,$nomEjercicio,$repeticiones,$numSeries,$nomCondicion,$condicion){
    $DSN = 'pgsql:host='.IP.';dbname=gym';
    $con= new PDO($DSN,USER,PASS);
    $sql="update".$nomTabla."set ejercicio=".$nomEjercicio.",repeticiones=".$repeticiones.", series=".$numSeries."where".$nomCondicion.$condicion;
    $result=$con->exec($sql);
}