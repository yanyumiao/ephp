<?php
// 自动加载
// 优化
function autoload($class){
	require_once MODEL_PATH.$class.'.php';
}

// 返回一个模型
// 优化
function M($class){
	require_once MODEL_PATH.$class.'.php';
	return new $class;
}

function R(){
	
}
