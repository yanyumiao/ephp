<?php

function autoload($class){
	if(file_exists(PATH_CTRL.$class.'.php')) require_once PATH_CTRL.$class.'.php';
	if(file_exists(PATH_MODEL.$class.'.php')) require_once PATH_MODEL.$class.'.php';
}	

function placeholder($num){
	for($i=0;$i<$num;$i++) { if($i==0) $str='?'; else $str.=',?'; }
	return $str;
}
