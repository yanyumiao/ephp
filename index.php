<?php
/**
 * Ephp is an open source php freamework, so easy!!!
 * git@github.com:YanYuMiao/Ephp.git
 * (c) 2015 YanYuMiao
 */

define('APP_PATH', './app/');
define('CTRL_PATH', APP_PATH.'ctrl/');

$ctrl=$_GET['ctrl'];
unset($_GET['ctrl']);
$act=$_GET['act'];
unset($_GET['act']);

require CTRL_PATH.'ctrl.php';
require CTRL_PATH.$ctrl.'.php';

$app=new $ctrl;
$app->$act();