<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';


define("DS", DIRECTORY_SEPARATOR);
define("ROOT_PATH", __DIR__ . DS);
define("APP", ROOT_PATH . 'APP' . DS);
define("CORE", APP . 'Core' . DS);
define("PLUGINS", CORE . 'Plugins' . DS);
define("CONTROLLERS", APP . 'Controllers' . DS);
define("MODELS", APP . 'Models' . DS);
define("VIEWS", APP . 'Views' . DS);
define("RESOURCE", ROOT_PATH . 'resourse' . DS);
define("UPLOADS", RESOURCE . 'uploads' . DS);
define("EXCEPTIONS", APP . 'Exceptions' . DS);
define("SMARTY_ENGINE", APP . 'SMARTY_ENGINE' . DS);
define('SITE_URL', 'http://crud.mvc.vashouse.com/');

// configuration files
require_once PLUGINS . 'helper.php';

//to load enviroment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use App\Core\App;
use App\Core\Config;

new App(new Config($_ENV));