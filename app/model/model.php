<?php 

class model {
	public $redis;
	
	public function __construct(){
			$this->redis= db::get_redis_instance();
	}

}
