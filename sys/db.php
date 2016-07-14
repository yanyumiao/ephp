<?php 

class DB {
	public static $mysql_instance;
	public static $redis_instance;

	public static function getMysqlInstance($config=''){
		if(empty($config)) $config=$GLOBALS['config']['mysql'];
		if(empty(self::$mysql_instance[$config['dsn']]))
			self::$mysql_instance[$config['dsn']] = new PDO($config['dsn'], $config['user'], $config['password']);
		return self::$mysql_instance[$config['dsn']];
	}

	public static function getRedisInstance($config=''){
		if(empty($config)) $config=$GLOBALS['config']['redis'];
		if(empty(self::$redis_instance[$config['host']])){
			$redis=new Redis();
			$redis->connect($config['host'], $config['port']);
			self::$redis_instance[$config['host']]=$redis;
		}
		return self::$redis_instance[$config['host']];
	}

	public static function insert($table, $data, $config=''){
		$db=self::getMysqlInstance($config);
		$fields=array_keys($data);
		$values=array_values($data);
		$sql = 'INSERT INTO '.$table.' ('.implode(', ', $fields).') VALUES ('.placeholder(count($values)).')';
		$pre=$db->prepare($sql);
		return $pre->execute($values);
	}

	public static function update($table, $data, $where, $config=''){
		$db=self::getMysqlInstance($config);
		$sql="UPDATE $table SET ";
		foreach($data as $k => $v){$sql.="$k=?, ";$values[]=$v;}
		$sql=rtrim($sql, ' ,')." WHERE"; 
		foreach($where as $k => $v){$sql.=" $k=? AND";$values[]=$v;}
		$sql=rtrim($sql, ' AND');
		$pre=$db->prepare($sql);
		return $pre->execute($values);
	}

	public static function select($pre_sql, $config=''){

	}

	public static function find($pre_sql, $config){

	}

	public static function exec($sql, $config=''){
		$db=self::getMysqlInstance($config);
		return $db->exec($sql);
	}
	
}

