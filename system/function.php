<?php

function autoload($class){
	require_once MODEL_PATH.$class.'.php';
}

// return a model
function M($class){
	return new $class;
}

