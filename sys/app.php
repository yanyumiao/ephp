<?php

class App {
	public static function init(){}

	public static function router(){
		if(!empty($_SERVER['PATH_INFO'])) {
			$path=$_SERVER['PATH_INFO'];
			$path_arr=explode('/', $path);
			$ctrl=$path_arr[1];
			$act=isset($path_arr[2]) ? $path_arr[2] : 'index';
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

