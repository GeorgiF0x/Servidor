
<?
    if(!isset($_SESSION['palabra'])){
        $_SESSION['vista']=VIEW.'inicioPartida.php';
    }else{
        $_SESSION['vista']=VIEW.'juego.php';
        $palabra= PalabraDAO::findRandom();
        $_SESSION['palabra']=$palabra;
        
    }
    