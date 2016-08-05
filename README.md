#### 关于easyphp 
easyphp是一个非常简单的php框架，全部框架的实现只使用了很少的代码    

#### 特性
* 实现简单 源码易读   
* MVC分层 SERVICE层可选  
* 动态加载smarty  
* DB类 单例 PDO prepare 防SQL注入  
* xss过滤  
* 实用日志  

#### 目录结构
```
│  README.md  
├─app (web应用目录)
│  ├─config (配置目录)
│  │      db_config.php (db配置)
│  ├─ctrl (控制器目录)
│  │      indexCtrl.php (默认控制器)
│  ├─lib (第三方类库)
│  │  │  smartyLib.php (动态引入smarty)
│  │  └─smarty (smarty目录)
│  ├─log (日志目录)
│  ├─model (模型目录)
│  ├─service (服务目录)
│  └─view (视图目录)
│      ├─cache (视图缓存目录)
│      ├─compile (视图编译目录)
│      └─html (视图模板目录)
├─sys (框架目录)
│      app.php (核心类)
│      ctrl.php (控制器基类)
│      db.php (DB类)
│      function.php (函数库)
└─web (web入口目录)
        index.php (入口文件) 
```

#### 安装
* 数据库配置，~/app/db_config.php  
* 添加smarty，将smarty中libs目录copy到~/app/lib/smarty目录    

#### 访问
127.0.0.1/index.php/controller/action  

#### 去掉index.php
apache 添加.htaccss文件到~/web目录即可  
```
<IfModule mod_rewrite.c>  
	RewriteEngine on  
	RewriteCond %{REQUEST_FILENAME} !-d  
	RewriteCond %{REQUEST_FILENAME} !-f  
	RewriteRule ^(.*)$ index.php/$1 [L]  
</IfModule>  
```
nginx (需 php.ini 中 cgi.fix_pathinfo=1)  
``` 
location /{
    ...
    if (!-e $request_filename) {
        rewrite ^/(.*)$ /index.php/$1 last;
        break;
    }
}
location ~ .+\.php($|/) {
    ...
    fastcgi_split_path_info ^(.+\.php)(.*)$;
    fastcgi_param PATH_INFO $fastcgi_path_info;
}
```

#### DB操作
```
mysql> SELECT * FROM user;
+----------+-------+  
| username | phone |  
+----------+-------+  
| a        | 1     |  
| a        | 2     |  
| b        | 3     |  
+----------+-------+  

<?php
DB::insert('user', ['username'=>'a', 'phone'=>'1']);
DB::update('user', ['phone'=>'1'], ['username'=>'a']);
DB::select('user', 'SELECT * FROM `user` WHERE username=?', ['a']);
DB::find('user', 'SELECT * FROM `user` WHERE phone=?', ['1']);
DB::delet('user', ['phone'=>'1']);
```

#### 日志
系统默认开启访问日志，App::init()中调用request_log()方法实现  
日志文件命名采用日期加后缀的格式，如20160805.request 20160805.debug  

