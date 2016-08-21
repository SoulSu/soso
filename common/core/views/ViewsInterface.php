<?php

/**
 * Created by PhpStorm.
 * User: soul
 * Date: 16-8-20
 * Time: 下午9:17
 */

namespace common\core\views;

interface ViewsInterface
{


    public function vbefore();

    public function vafter();

    public function render();

}