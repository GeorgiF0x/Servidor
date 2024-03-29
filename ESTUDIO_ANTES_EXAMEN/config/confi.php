<?
//constantes que vamos usar en la app
define('IMG', './webroot/img/');
define('CSS', './webroot/css/');
define('JS', './webroot/js/');
define('VIEW', './views/');
define('CON', './controllers/');

require('./core/funciones.php');
require('./core/curl.php');
require('./core/configurarAPI.php');
require('./config/confiBD.php');
require('./dao/FactoryBD.php');
require('./models/Coche.php');
require('./models/Propietario.php');
require('./dao/CochesDao.php');
require('./dao/PropietariosDao.php');

