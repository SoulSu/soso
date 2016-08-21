<?php

/**
 * Created by PhpStorm.
 * User: soul
 * Date: 16-8-20
 * Time: 下午8:42
 */

namespace common;


use common\core\Log;

class bootstrap
{


    public static function run($conf)
    {
        // 自动加载类
        self::load_class();

        // 加载日志类
        self::load_log($conf['log']);

        // 加载路由信息
        {
            Log::info("aaaaaaaaaa", __CLASS__);
        }
        // 初始化

        // 注册控制器
        {
            self::load_controller();
        }

    }

    private static function load_router()
    {

    }

    private static function load_controller()
    {
        dump($_SERVER);
        $request_uri = explode('?',$_SERVER['REQUEST_URI'])[0];
        $request_uri = trim($request_uri, '/');

        $controller = explode('/',$request_uri )[0];
        $method = explode('/',$request_uri )[0];

        dump($controller,$method);

        $call_controller  = APPNAME . '\controller\\' . ucfirst($controller) . 'Controller';
        $call_method = 'action_' . strtolower($method);

        $call_class = new $call_controller();
        $call_class->$call_method();

    }

    private static function load_log(array $log_conf)
    {
        Log::getinstance($log_conf);
    }

    private static function load_class()
    {
        require ROOTPATH . '/common/core/Autoload.php';
        spl_autoload_register('\common\core\Autoload::autoload_register');
    }


}