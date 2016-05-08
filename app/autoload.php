<?php

$loader = new \Phalcon\Loader();

$loader->registerDirs(array(
    realpath(dirname(__FILE__)) . '/controllers/',
    realpath(dirname(__FILE__)) . '/models/',
    realpath(dirname(__FILE__)) . '/forms/',
    realpath(dirname(__FILE__)) . '/library/',
    realpath(dirname(__FILE__)) . '/validators/',
));

$loader->registerNamespaces(array(
    'Transejecutivos\\Misc' => realpath(dirname(__FILE__)) . '/misc/',
    'Transejecutivos\\Logic' => realpath(dirname(__FILE__)) . '/logic/',
    'Transejecutivos\\Configuration' => realpath(dirname(__FILE__)) . '/configuration/',
    'Transejecutivos\\Validators' => realpath(dirname(__FILE__)) . '/validators/',
    'Transejecutivos\\Plugins' => realpath(dirname(__FILE__)) . '/plugins/'
        ), true);

// register autoloader
$loader->register();
