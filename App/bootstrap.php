<?php
// set the timezone
date_default_timezone_set('America/Montreal');

// set some CONSTANTS

define('ROOT_PATH', dirname(dirname(__FILE__)));
define('APP_PATH', ROOT_PATH.'/App/');
define('VIEW_PATH', ROOT_PATH.'/View/');
define('FRAMEWORK_PATH', ROOT_PATH.'/Framework/');

// determine environment

// determine platform
define('PLATFORM', 'pc');
$env = strstr($_SERVER['HTTP_HOST'], '.local') ? "Dev" : "Prod";
define('ENV', $env);

// set the includes (add the framework and the app to the include path)
set_include_path(FRAMEWORK_PATH.PATH_SEPARATOR.ROOT_PATH.PATH_SEPARATOR.get_include_path());

// initialize autoloader
include(FRAMEWORK_PATH.'Package_v1/Loader.php');
\Package_v1\Loader::initializeAutoloader();

// initialize cache

// initialize config
$config = \Package_v1\Config::loadConfig(APP_PATH."Config/$env/config.php");

// initialize db
\Package_v1\Mysqli::initialize($config['mysql']['master']);

// maybe ? store them in register?
\Package_v1\Registry::store('config', $config);