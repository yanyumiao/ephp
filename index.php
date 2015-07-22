<?php
/**
 * Ephp is an open source php freamework, so easy!!!
 * git@github.com:YanYuMiao/Ephp.git
 * (c) 2015 YanYuMiao
 */

// const
define('SYS_PATH', './sys/');
define('APP_PATH', './app/');
define('CTRL_PATH', APP_PATH.'ctrl/');

// route
$ctrl=$_GET['ctrl'];
unset($_GET['ctrl']);
$act=$_GET['act'];
unset($_GET['act']);

// require
require SYS_PATH.'function.php';
require APP_PATH.'dbconfig.php';
require CTRL_PATH.'ctrl.php';
require CTRL_PATH.$ctrl.'.php';

// run
$app=new $ctrl;
$app->$act();

