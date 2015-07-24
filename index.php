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

// route
$ctrl=$_GET['ctrl'];
unset($_GET['ctrl']);
$act=$_GET['act'];
unset($_GET['act']);

// require
require APP_PATH.'config.php';
require SYS_PATH.'function.php';
require SYS_PATH.'db.php';
require MODEL_PATH.'model.php';
require CTRL_PATH.'ctrl.php';
require CTRL_PATH.$ctrl.'.php';

// autoload
spl_autoload_register('autoload');

// run
$app=new $ctrl;
$app->$act();

