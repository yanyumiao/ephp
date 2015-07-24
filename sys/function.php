<?php

// 自动加载
function autoload($class){
	require_once MODEL_PATH.$class.'.php';
}

// 返回一个模型
function M($class){
	require_once MODEL_PATH.$class.'.php';
	return new $class;
}

