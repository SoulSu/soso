#!/bin/env php

<?php

// just for init a sample application

$argc = $_SERVER['argc'];
$argv = $_SERVER['argv'];

/**
 *
 * ./soso.php new app2
 *
 *
 */


$create = [
    'config',
    'controller' => ['IndexController.php|'],
    'log',
    'module',
    'index.php|common/init'
];

if ($argv[1] == 'new') {
    $appliction_name = $argv[2];
    mkdir($appliction_name, 0666);

    foreach ($create as $name => $next) {
        $real_path = $appliction_name . '/' . $name;

        if (pathinfo($real_path, PATHINFO_EXTENSION) == 'php') {
            if ($name == 'index.php') {
                file_put_contents($real_path, file_get_contents('common/init'));
            }
        } else {
            if (is_array($next)) {

            } else {
                mkdir($real_path, 0666);
            }
        }
    }


}










