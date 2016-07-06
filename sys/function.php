<?php

function autoload($class){
	if(file_exists(PATH_CTRL.$class.'.php')){
		require_once PATH_CTRL.$class.'.php';
	}elseif(file_exists(PATH_MODEL.$class.'.php')){
		require_once PATH_MODEL.$class.'.php';
	}else{
		// 抛异常
	}
}	

