<?php
/**
 * Created by PhpStorm.
 * User: soul
 * Date: 16-8-20
 * Time: 下午11:34
 */

namespace common\core;


use common\core\log\FileLog;

class Log
{

    private static $logger = NULL;

    private static $conf = [];

    public static function getinstance($conf)
    {
        if (is_null(self::$logger)) {
            self::$conf = $conf;
            self::$logger = new FileLog();
        }
        return self::$logger;
    }

    public static function alert(string $message, string $call_class)
    {
        self::$logger->alert($message, ['conf' => self::$conf['path'], 'cate'=>$call_class]);
    }

    public static function critical(string $message, string $call_class)
    {
        self::$logger->critical($message, ['conf' => self::$conf['path'], 'cate'=>$call_class]);
    }

    public static function debug(string $message, string $call_class)
    {
        self::$logger->debug($message, ['conf' => self::$conf['path'], 'cate'=>$call_class]);
    }

    public static function emergency(string $message, string $call_class)
    {
        self::$logger->emergency($message, ['conf' => self::$conf['path'], 'cate'=>$call_class]);
    }

    public static function error(string $message, string $call_class)
    {
        self::$logger->error($message, ['conf' => self::$conf['path'], 'cate'=>$call_class]);
    }

    public static function info($message, $call_class)
    {
        self::$logger->info($message, ['conf' => self::$conf['path'], 'cate'=>$call_class]);
    }

    public static function notice(string $message, string $call_class)
    {
        self::$logger->notice($message, ['conf' => self::$conf['path'], 'cate'=>$call_class]);
    }

    public static function warning(string $message, string $call_class)
    {
        self::$logger->warning($message, ['conf' => self::$conf['path'], 'cate'=>$call_class]);
    }

}