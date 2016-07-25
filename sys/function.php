<?php

function autoload($class){
	if(file_exists(PATH_CTRL.$class.'.php')) require_once PATH_CTRL.$class.'.php';
	if(file_exists(PATH_MODEL.$class.'.php')) require_once PATH_MODEL.$class.'.php';
}

// Avoid http_build_query() auto urlencode params
function http_build_str($data){
	foreach($data as $k => $v) {
		$arr[] = "$k=$v";
	}
	return implode('&', $arr);
}

function write_log($file, $content){
	$content='['.date('Y-m-d H:i:s', CURRENT_TIME).'] '.$content;
	file_put_contents($file, $content, FILE_APPEND|LOCK_EX);
}

function request_log(){
	$file=PATH_LOG.CURRENT_DATE.'.request';
	$method=$_SERVER['REQUEST_METHOD']; // GET, HEAD, POST, PUT 

	$url=isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/index/index';
	if($_SERVER['QUERY_STRING']) $url.='?'.$_SERVER['QUERY_STRING'];

	$content='';
	switch ($method) {
		case 'GET':
			$content='GET '.$url;
			break;

		case 'POST':
			if($input=file_get_contents('php://input')){
				$content='INPUT '.$url.' '.$input;
			}else{
				$content='POST '.$url.' '.http_build_str($post);
			}
			break;
		
		default:
			$content=$method; // ...
			break;
	}
	$content.=PHP_EOL;
	write_log($file, $content);
}