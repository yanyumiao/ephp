<?php
/**
 * Ephp is an open source php framework, so easy!!!
 * git@github.com:YanYuMiao/Ephp.git
 * (c) 2015 YanYuMiao
 */

// const
define('SYS_PATH', './sys/');
define('APP_PATH', './app/');
define('MODEL_PATH', APP_PATH.'model/');
define('CTRL_PATH', APP_PATH.'ctrl/');

// require core file
require SYS_PATH.'app.php';
require APP_PATH.'config.php';
require SYS_PATH.'function.php';
require SYS_PATH.'db.php';
require MODEL_PATH.'model.php';
require CTRL_PATH.'ctrl.php';

// autoload
spl_autoload_register('autoload');

// run

