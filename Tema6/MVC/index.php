<?
     require("./config/config.php");
     session_start();
     if(isset($_REQUEST['login'])){

          $_SESSION['vista']=VIEW.'login.php';
          
     }
     if(isset($_REQUEST['home'])){

          $_SESSION['vista']=VIEW.'home.php';
          
     }
     
     require("./views/layout.php");
//     UserDAO::findAll();

     // UserDAO::findByID("user3");


     // $usuario5 = new User('user5','pass','usuario5','2024-01-11 20:40:00','usuario');
     // UserDAO::insert($usuario5);
     // UserDAO::findByID("user5");




     // $usuario3=UserDAO::findByID("user3");
     // $usuario3->descUsuario="pepePEPEPEPE";
     // UserDAO::update($usuario3);
     // UserDAO::findByID("user3");

     // UserDAO::validarUser("user5","9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684");
     
     // UserDAO::findByID("user1");
     // $usuario4=UserDAO::findByID("user3");
     // $usuario3->descUsuario="pepe";
     // $usuarioNuevo = new User('user4','pass','usuario4','2024-01-11 20:40:00','usuario','true');