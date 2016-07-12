<?php 

class DB {
	public static $mysql_db;
	public static $redis_db;

	public static function getMysqlDb($config=[]){
		if(empty($config)) $config=$GLOBALS['config']['mysql'];
		if(empty(self::$mysql_db[$config['dsn']])) self::$mysql_db[$config['dsn']] = new PDO($config['dsn'], $config['user'], $config['password']);
		return self::$mysql_db[$config['dsn']];
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
