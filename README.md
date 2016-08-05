#### 关于easyphp 
easyphp是一个非常简单的php框架，全部框架的实现只使用了很少的代码  
熟练的PHPer只需要花费10分钟即可阅读框架的全部代码(web/index.php sys/* lib/smartyLib.php)  

#### 特性
* 实现简单 源码易读   
* MVC分层 SERVICE层可选  
* 访问日志 默认开启的  
* DB类 单例 & PDO prepare实现 防止SQL注入  
* xss过滤  

#### 目录结构
```
│  README.md  
├─app(web应用)
│  ├─config
│  │      db_config.php
│  ├─ctrl
│  │      indexCtrl.php
│  ├─lib(第三方类库)
│  │  │  smartyLib.php
│  │  └─smarty
│  ├─log
│  ├─model
│  ├─service
│  └─view
│      ├─cache
│      ├─compile
│      └─html
├─sys(框架)
│      app.php
│      ctrl.php
│      db.php
│      function.php
└─web
        index.php
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

####   