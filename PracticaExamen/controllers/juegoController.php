
<?
    if(isset($_SESSION['palabra'])){
        $_SESSION['vista']=VIEW.'juego.php';
    }else{
        $_SESSION['vista']=VIEW.'juego.php';
        $palabra= PalabraDAO::findRandom();
        $_SESSION['palabra']=$palabra;
    }
    
    $_SESSION['intentos']=0;
    if(isset($_REQUEST['botonIntento'])){
        while($_SESSION['intentos']<=6){
            $_SESSION['intentoJuego']=compararPalabras($_SESSION['palabra'],$_REQUEST['palabraJuego']);
            if($_SESSION['intentoJuego']=="x"){
                $_SESSION['intentos']++;
            }
        }
    }
    