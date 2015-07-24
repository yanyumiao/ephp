<?php 
class model {
	public $redis;
	
	// 单例
	// 优化
	public function __construct(){
		$this->redis=new Redis();
		$this->redis->connect($GLOBALS['conf']['redis']['host'], $GLOBALS['conf']['redis']['port']);
	}

}
