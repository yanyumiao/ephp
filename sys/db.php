<?php 

class DB {
	public static $mysql_instance;
	public static $redis_instance;

	public static function getMysqlInstance($config=[]){
		if(empty($config)) $config=$GLOBALS['config']['mysql'];
		if(empty(self::$mysql_instance[$config['dsn']])) self::$mysql_instance[$config['dsn']] = new PDO($config['dsn'], $config['user'], $config['password']);
		return self::$mysql_instance[$config['dsn']];
	}

	public static function getRedisInstance($config=[]){
		if(empty($config)) $config=$GLOBALS['config']['redis'];
		if(empty(self::$redis_instance[$config['host']])){
			$redis=new Redis();
			$redis->connect($config['host'], $config['port']);
			self::$redis_instance[$config['host']]=$redis;
		}
		return self::$redis_instance[$config['host']];
	}

	public static function insert($table, $data, $config=[]){

	}

	public static function update($table, $filed, $where, $config=[]){

	}

	public static function select($sql, $config=[]){

	}

	public static function find($sql, $config=[]){

	}

	public static function exec($sql, $cnofig=[]){

	}

	public static function query($sql, $config=[]){

	}
}
