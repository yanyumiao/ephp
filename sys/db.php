<?php 

// 单例
class db {
	private static $redis_instance;
	private static $mysql_instance;
	
	public static function get_redis_instance() {
		if(empty(self::$redis_instance)){
			$redis=new Redis();
			$redis->connect($GLOBALS['conf']['redis']['host'], $GLOBALS['conf']['redis']['port']);
			self::$redis_instance=$redis;
		}
		return self::$redis_instance;
	}
	
	public static function get_mysql_instance() {
		
	}
	
	// clone
}
