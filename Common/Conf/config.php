<?php
return array(
	//'配置项'=>'配置值'
	"SHOW_PAGE_TRACE"=>true,
	//应用类库不再需要使用命名空间
    // 'APP_USE_NAMESPACE'    =>    false, 
    'LOAD_EXT_CONFIG' => 'user,db,three',
    'URL_MODEL'=>3,    
    /* 数据库配置 */
    'DB_TYPE'   => 'mysqli', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'wrtdata', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'wrt_', // 数据库表前缀

    "BAIDU_MAP_APK" =>"8a7dcea6fe73b77b3c5f6d70d1cc453c",
    'web_copy'=>'版权所有 2014-'.date('Y',time()).' 慧锐通智能科技股份有限公司',
    //携程数据是否输出错误
    'CU_DEVELOP'=>false,
    'LOG_TYPE'  =>"Sql",// 日志记录类型 默认为文件方式
    'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR',

);