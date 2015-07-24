<?php 
class usermodel extends model {
	
	public function adduser($user){
		$uid = $this->redis->incr('uid');
		$this->redis->hSet("user:$uid", 'name',$user['name']);
		$this->redis->hSet("user:$uid", 'age',$user['age']);
		return $uid;
	}
	
	public function getuser($uid){
		$key="user:$uid";
		return $this->redis->hGetAll($key);
	}
	
}
