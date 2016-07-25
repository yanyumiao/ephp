<?php
/**
 * easyphp, easy php framework
 * (c) 2015 YanYuMiao
 *
 */

//
define('PATH_SYS', '../sys/');
define('PATH_APP', '../app/');
define('PATH_MODEL',   PATH_APP.'model/');
define('PATH_SERVICE', PATH_APP.'service/');
define('PATH_CTRL',    PATH_APP.'ctrl/');
define('PATH_LOG',     PATH_APP.'log/');

//
define('CURRENT_TIME', time());
define('CURRENT_DATE', date('Ymd', CURRENT_TIME));

//
require PATH_APP.'config.php';
require PATH_SYS.'app.php';
require PATH_SYS.'function.php';
require PATH_SYS.'ctrl.php';
require PATH_SYS.'db.php';

//
spl_autoload_register('autoload');

//
App::run();

