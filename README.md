#### 关于easyphp 
easyphp是一个非常简单的php框架，全部框架的实现只使用了很少的代码  

熟练的PHPer只需要花费10分钟便可以阅读框架的全部核心代码(sys目录下)    
如果觉得那里不爽，分分钟改造成你自己想要的样子  

#### 特性
* 简单  
* 简单  
* 简单  

#### 安装
你需要做的仅仅是修改一下数据库配置文件，~/app/db_config.php  

如果需要视图引擎的支持，系统已经为你引入了smarty作为视图引擎  
只需要将smarty中libs目录copy到~/app/lib/smarty目录下即可 测试支持smarty2 smarty3  

#### 访问
127.0.0.1/index.php/controller/action  

#### 去掉index.php
*如果使用apache服务器，添加.htaccss文件到~/web目录即可  
```
<IfModule mod_rewrite.c>  
	RewriteEngine on  
	RewriteCond %{REQUEST_FILENAME} !-d  
	RewriteCond %{REQUEST_FILENAME} !-f  
	RewriteRule ^(.*)$ index.php/$1 [L]  
</IfModule>  
```
*如果使用nginx服务器需要如下配置('...'表示省略)
``` 
...
location /{
    ...
    index index.php;
    if (-e $request_filename) {
        break;
    }
    if (!-e $request_filename) {
        rewrite ^/(.*)$ /index.php/$1 last;
        break;
    }
}
...
location ~ .+\.php($|/) {
    ...
    fastcgi_split_path_info ^(.+\.php)(.*)$;
    fastcgi_param PATH_INFO $fastcgi_path_info;
    ...
}
...
```
#### Copyright
(c) 2015 YanYuMiao

