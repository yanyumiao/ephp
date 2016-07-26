<?php

function autoload($class){
	if(file_exists(PATH_CTRL.$class.'.php')) require_once PATH_CTRL.$class.'.php';
	if(file_exists(PATH_MODEL.$class.'.php')) require_once PATH_MODEL.$class.'.php';
}

// Avoid http_build_query() auto urlencode params
function http_build_str($data){
	foreach($data as $k => $v) {
		$str .= "{$k}={$v}&";
	}
	return rtrim($str, '&');
}

function write_log($file, $content){
	$content='['.date('Y-m-d H:i:s', CURRENT_TIME).'] '.$content;
	file_put_contents($file, $content, FILE_APPEND|LOCK_EX);
}

function request_log(){
	$file=PATH_LOG.CURRENT_DATE.'.request';
	$method=$_SERVER['REQUEST_METHOD']; // GET, HEAD, POST, PUT 

	$url='';
	if(isset($_SERVER['PATH_INFO']) && !empty($_SERVER['PATH_INFO'])) // apache && nginx 
		$url=$_SERVER['PATH_INFO']; 
	if($_SERVER['QUERY_STRING']) $url.='?'.$_SERVER['QUERY_STRING'];

	$content='';
	if($method == 'GET') $content='GET '.$url;
	if($method == 'POST') {
		if($input=file_get_contents('php://input'))
			$content='INPUT '.$url.'?'.$input;
		else
			$content='POST '.$url.'?'.http_build_str($_POST);
	}

	write_log($file, $content.PHP_EOL);
}
