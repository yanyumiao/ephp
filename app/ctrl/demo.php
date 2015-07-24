<?php
class demo extends ctrl {
	public function index(){
		echo 'Welcome to Ephp';
	}
	
	public function hello(){
		echo 'Hello World';
	}
	
	public function adduser(){
		$user=array();
		$user['name']='jake';
		$user['age']=22;
		$usermodel=M('usermodel');
		$ret=$usermodel->adduser($user);
		
		echo '<pre>';
		print_r($usermodel);
		print_r($ret);
	}
	
	public function getuser(){
		$uid=$_GET['uid'];
		$usermodel=M('usermodel');
		$user=$usermodel->getuser($uid);

		echo '<pre>';
		print_r($user);
	}
}
