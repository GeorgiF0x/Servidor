<?
     require("./config/config.php");

    UserDAO::findAll();

    UserDAO::findByID("user1");
     $usuario = new User('user3',sha1('pass'),'usuario3','2024-01-11 20:40:00','usuario');
    UserDAO::insert($usuario);