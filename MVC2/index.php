<?php

require('./config/config.php');
session_start();




if(isset($_SESSION['controller']))
    require($_SESSION['controller']);
require('./views/layout.php');

