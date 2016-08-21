<?php

// 模式
define('DEBUG', TRUE);

// 框架地址
define('ROOTPATH', realpath(__DIR__ . '/../'));

// 项目地址
define('APPPATH', ROOTPATH . '/app1');

// 加载 composer 类库
require ROOTPATH . '/vendor/autoload.php';


if (DEBUG) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}
//





// 加载启动配置
require ROOTPATH . '/common/soso.php';
\common\bootstrap::run(require APPPATH . '/config/init.php');


