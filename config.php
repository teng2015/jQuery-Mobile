<?php

return array(
    /* 数据库设置 */
    'DB_TYPE' => 'mysql', // 数据库类型

   // 'DB_HOST' => '192.168.0.59', // 服务器地址
   // 'DB_NAME' => 'ehaving2.0', // 数据库名
   // 'DB_USER' => 'root', // 用户名
   // 'DB_PWD' => 'test', // 密码
   // 'DB_PORT' => '3306', // 端口


    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'ehaving2.0', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => 'test', // 密码
    'DB_PORT' => '3306', // 端口
    'DB_PREFIX' => 'j_', // 数据库表前缀
    'DB_FIELDTYPE_CHECK' => false, // 是否进行字段类型检查
    'DB_FIELDS_CACHE' => true, // 启用字段缓存
    'DB_CHARSET' => 'utf8', // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE' => 0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE' => false, // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM' => 1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO' => '', // 指定从服务器序号
    'DB_SQL_BUILD_CACHE' => false, // 数据库查询的SQL创建缓存
    'DB_SQL_BUILD_QUEUE' => 'file', // SQL缓存队列的缓存方式 支持 file xcache和apc
    'DB_SQL_BUILD_LENGTH' => 20, // SQL缓存的队列长度
    'DB_SQL_LOG' => false, // SQL执行日志记录
    'TMPL_ACTION_ERROR' => 'Public:error', //默认成功跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Public:success',
//  'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息
//  'DATA_BACKUP_PATH'=>'/Public',
// 'DEFAULT_THEME'         => 'Default',
// 'TMPL_FILE_DEPR'        => '_',
// 'APP_GROUP_LIST'        => 'Home,Admin',//项目分组设定
// 'DEFAULT_GROUP'         => 'Home',//默认分组
// 'APP_GROUP_MODE'        =>1,//项目独立分组
// 'URL_HTML_SUFFIX'       => 'html',//伪静态后缀    // 'URL_MODEL'             =>2//URL模式

    'LANG_SWITCH_ON' => true, // 开启语言包功能
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST' => 'zh-cn', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE' => 'l', // 默认语言切换变量
    'uploadfileUrl' => 'Public/upload/', //用户上传文件存放路径
    'uploadfileType' => array('jpg', 'gif', 'png', 'jpeg'), //用户上传文件类型
    'uploadadsUrl' => 'Public/admin/adsupload/', //上传广告类的图片
    /* SESSION设置 */
    'SESSION_AUTO_START' => true, // 是否自动开启Session
    'SESSION_OPTIONS' => array(), // session 配置数组 支持type name id path expire domain 等参数
    'SESSION_TYPE' => '', // session hander类型 默认无需设置 除非扩展了session hander驱动
    'SESSION_PREFIX' => '', // session 前缀
//'VAR_SESSION_ID'      => 'session_id',     //sessionID的提交变量

    'DB_FIELD_CACHE' => false, 'HTML_CACHE_ON' => false, 'TMPL_CACHE_ON' => false,
    /* 数据缓存设置 */
    'DATA_CACHE_TIME' => 0, // 数据缓存有效期 0表示永久缓存
    'DATA_CACHE_COMPRESS' => false, // 数据缓存是否压缩缓存
    'DATA_CACHE_CHECK' => false, // 数据缓存是否校验缓存
    'DATA_CACHE_PREFIX' => '', // 缓存前缀
    'DATA_CACHE_TYPE' => 'File', // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
    'DATA_CACHE_PATH' => TEMP_PATH, // 缓存路径设置 (仅对File方式缓存有效)
    'DATA_CACHE_SUBDIR' => false, // 使用子目录缓存 (自动根据缓存标识的哈希创建子目录)
    'DATA_PATH_LEVEL' => 1, // 子目录缓存级别
    /* 日志设置 */
    'LOG_RECORD' => false, // 默认不记录日志
    'LOG_TYPE' => 3, // 日志记录类型 0 系统 1 邮件 3 文件 4 SAPI 默认为文件方式
    'LOG_DEST' => '', // 日志记录目标
    'LOG_EXTRA' => '', // 日志记录额外信息
    'LOG_LEVEL' => 'EMERG,ALERT,CRIT,ERR', // 允许记录的日志级别
    'LOG_FILE_SIZE' => 2097152, // 日志文件大小限制
    'LOG_EXCEPTION_RECORD' => false, // 是否记录异常信息日志
    'settingfile_path' => './Home/conf/setting.config.php',
    'DB_BACKUP'=>'./e/dateback/',

    'MAIL_ADDRESS' => '723861002@qq.com', // 邮箱地址
    'MAIL_SMTP' => 'smtp.qq.com', // 邮箱SMTP服务器
    'MAIL_LOGINNAME' => '723861002', // 邮箱登录帐号
    'MAIL_PASSWORD' => 'Web.68160284', // 邮箱密码
    'MAIL_CHARSET' => 'UTF-8',//编码
    'MAIL_AUTH' => true,//邮箱认证
    'MAIL_HTML' => true,//true HTML格式 false TXT格式

);
