<?php

class ctrl {
	protected function assign($k, $v){
		$smarty=smartyLib::getInstance();
		$smarty->assign($k, $v);
	}
	
	protected function display($view){
		$smarty=smartyLib::getInstance();
		$smarty->display($view);
	}
}
