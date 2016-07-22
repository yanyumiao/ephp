<?php

class indexCtrl extends ctrl {
	public function indexAct(){
		echo 'Welcome to Ephp';
	}

	public function testAct(){
		//echo 'Test';
		var_dump(CURRENT_TIME);
		write_log(PATH_LOG.'a.txt', "this is a test\r\n");
	}
}
