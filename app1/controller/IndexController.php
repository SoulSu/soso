<?php

/**
 * Created by PhpStorm.
 * User: soul
 * Date: 16-8-20
 * Time: 下午9:08
 */

namespace app1\controller;

use common\core\Controller;
use common\core\Log;

class IndexController extends Controller
{

    public function before()
    {
        parent::before();

        dump("controller before");
    }

    /**
     * 默认运行的控制器方法
     */
    public function action_index()
    {
        
        Log::info("hello hahaha", __CLASS__);

        dump('in index index func');

    }

}