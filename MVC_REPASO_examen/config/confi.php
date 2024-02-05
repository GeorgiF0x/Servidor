<?
//constantes que vamos usar en la app
define('IMG', './webroot/img/');
define('CSS', './webroot/css/');
define('JS', './webroot/js/');
define('VIEW', './views/');
define('CON', './controllers/');

require('./core/funciones.php');
require('./config/confiBD.php');
require('./dao/FactoryBD.php');
require('./models/User.php');
require('./dao/UserDao.php');
require('./models/Cita.php');
require('./dao/CitaDao.php');
