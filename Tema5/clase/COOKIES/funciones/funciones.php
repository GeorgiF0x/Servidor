<?

function insertarCookie(){
    if(!isset($_COOKIE['id'])){
        setcookie('id',$_REQUEST['id'],time()+3600,'/');
    }

    //Si existe , buscar si existe el mismo
    if(isset($_COOKIE['id'])){
        setcookie('id',$_REQUEST['id'],time()-3600,'/');
        setcookie('id',$_REQUEST['id'],time()+3600,'/');
    }
    //sino existe el mismo insertar el primero 
    if(isset($_COOKIE['id'])){
        setcookie('id',$_REQUEST['id'],time()+3600,'/');
    }
}