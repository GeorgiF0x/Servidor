<?
require('./config/confi.php');
session_start();

if(isset($_REQUEST['login'])){
    require CON.'LoginController.php';
}

require VIEW . 'layout.php';