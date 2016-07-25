<?php

class App {
	public static function init(){
		request_log();
	}

	public static function router(){
		if(isset($_SERVER['PATH_INFO']) && !empty($_SERVER['PATH_INFO'])) { // apache & nginx
			$path=explode('/', trim($_SERVER['PATH_INFO'], '/'));
			$ctrl=$path[0];
			$act=isset($path[1]) ? $path[1] : 'index';                           
		}else{
			$ctrl='index';
			$act='index';
		}
		return ['ctrl'=>$ctrl.'Ctrl', 'act'=>$act.'Act'];
	}

	public static function run() {
		self::init();
		$router=self::router();
		$ctrl=$router['ctrl'];
		$act=$router['act'];
		$class=new $ctrl();
		$class->$act();
	}
}
