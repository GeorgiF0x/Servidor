<?php 
    //configuracion costante que se use en toda la aplicacion por ejemplo para guardar la ruta para acceder a las imagenes

    define ("IMG", "./webroot/img/");
    //para css
    define ("CSS", "./webroot/css/");
    //para js
    define ("JS", "./webroot/js/");
    define ("VIEW", "./views/");

    require("./config/configBD.php");
    require("./dao/FactoryBD.php");
    require("./models/User.php");
    require("./dao/UserDAO.php");