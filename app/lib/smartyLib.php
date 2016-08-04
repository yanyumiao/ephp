<?php

class smartyLib {
  public static $instance;
  
  public static function getInstance(){
    if(empty(self::$instance)){
      require PATH_LIB.'smarty/Smarty.class.php';
      self::$instance=new Smarty();
      //
      self::$instance->left_delimiter = '{';
      self::$instance->right_delimiter = '}';
      self::$instance->caching = FALSE; // 缓存
      self::$instance->cache_dir = PATH_VIEW.'cache/';
      self::$instance->template_dir = PATH_VIEW.'html';
      self::$instance->compile_dir = PATH_VIEW.'compile/';
      self::$instance->compile_check = TRUE;
    }
    return self::$instance;
  }
}
