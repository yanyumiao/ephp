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
	
	/**
	 * 适用查询结果集可能为多条的情况
	 * 
	 * @param string $sql ; 含有占位符'?'的sql语句
	 * @param array $params ; 一维数组 由sql语句占位符的值组成
	 * @param array $config
	 * @return array
	 */
	public static function select($sql, $params, $config=''){
		$db=self::getMysqlInstance($config);
		$pre=$db->prepare($sql);
		$pre->execute($params);
		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * 适用查询结果集为一条的情况
	 * 
	 * @param string $sql ; 含有占位符'?'的sql语句
	 * @param array $params ; 一维数组 由sql语句占位符的值组成
	 * @param array $config
	 * @return array
	 */
	public static function find($sql, $params, $config=''){
		$db=self::getMysqlInstance($config);
		$pre=$db->prepare($sql);
		$pre->execute($params);
		return $pre->fetch(PDO::FETCH_ASSOC);
	}

	public static function exec($sql, $config=''){
		$db=self::getMysqlInstance($config);
		return $db->exec($sql);
	}
	
}

