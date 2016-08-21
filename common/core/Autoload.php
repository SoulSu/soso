<?php

/**
 * Created by PhpStorm.
 * User: soul
 * Date: 16-8-20
 * Time: 下午8:56
 */

namespace common\core;

class Autoload
{

    /**
     * @var array
     * 已经加载的类
     */
    public static $loaded_class = [];

    public static function autoload_register($class)
    {
        $class = str_replace('\\', '/', $class);
        if (isset(self::$loaded_class[$class])) {
            return TRUE;
        }else{
            $class_file = ROOTPATH . '/' . $class . '.php';
            if(file_exists($class_file)){
                require $class_file;
            }else{
                throw new Exception("file ${class} not fond");
            }
        }
        return TRUE;
    }

}