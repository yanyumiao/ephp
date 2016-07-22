<?php

function autoload($class){
	if(file_exists(PATH_CTRL.$class.'.php')) require_once PATH_CTRL.$class.'.php';
	if(file_exists(PATH_MODEL.$class.'.php')) require_once PATH_MODEL.$class.'.php';
}	

function write_log($file, $content){
	$content='['.date('Y-m-d H:i:s', CURRENT_TIME).'] '.$content;
	file_put_contents($file, $content, FILE_APPEND|LOCK_EX);
}

