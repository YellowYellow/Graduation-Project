<?php
return array(
	//'配置项'=>'配置值'
	//'配置项'=>'配置值'
   	// 'URL_MODEL'=>3,
	// 'SHOW_PAGE_TRACE'=>true,
	// 'URL_HTML_SUFFIX'=>'',
	// 'TMPL_L_DELIM'=>'<{', 			//修改左定界符
	// 'TMPL_R_DELIM'=>'}>', 			//修改右定界符
	'DB_TYPE'=>'mysql',   			//设置数据库类型
	'DB_HOST'=>'localhost',			//设置主机
	'DB_NAME'=>'graduate_project',	//设置数据库名
	'DB_USER'=>'root',    			//设置用户名
	'DB_PWD'=>'',        			//设置密码
	'DB_PORT'=>'3306',   			//设置端口号
	'DB_PREFIX'=>'',  			//设置表前缀
	'TMPL_CACHE_ON'   => true,  	// 默认开启模板编译缓存 false 的话每次都重新编译模板
	'ACTION_CACHE_ON'  => true,  	// 默认关闭Action 缓存
	'HTML_CACHE_ON'   => true,   	// 默认关闭静态缓存
);
?>