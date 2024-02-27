
<?php
if(!validado()){
    ?>
<form action="" method="post">
<input type="submit" value="Login" name="login">
</form>
<?
}
    if(comprobarCaducado($_SESSION['usuario']->$caduca)&&isset($_SESSION['usuario'])){
        ?>
            <form action="" method='post'>
                <input type="text" name="filtro" id="filtro">
                <input type="submit" value="Buscar">
            </form>
            <table>
                <thead>
                    <th>
                        <th>id</th>
                        <th>marca</th>
                        <th>modelo</th>
                        <th>año_fabricacion</th>
                        <th>kilometraje</th>
                        <th>precio</th>
                    </th>
                    <?php
            if (!empty($_SESSION['coches'])) { 
                foreach ($_SESSION['coches'] as $matricula) {
                    echo "<tr>";
                    echo "<td>".$matricula['id']."</td>";
                    echo "<td>".$matricula['marca']."</td>";
                    echo "<td>".$matricula['modelo']."</td>";
                    echo "<td>".$matricula['año_fabricacion']."</td>";
                    echo "<td>".$matricula['kilometraje']."</td>";
                    echo "<td>".$matricula['precio']."</td>";
                    echo "<td>".$matricula['color']."</td>";
                    echo "<td>".$matricula['descripcion']."</td>";
                    echo "</tr>";
                }
            }
            ?>
                </thead>
            </table>
        <?
        }else{
            echo "<p>Ha caducado su Token</p>";
        }
        ?>
        <form action="" method="post">
        <input type="submit" value="Cerrar Sesión" name="Login_CerrarSesion">
        </form>




