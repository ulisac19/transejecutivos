<?php

$loader = new \Phalcon\Loader();

$loader->registerDirs(array(
    '../app/controllers/',
    '../app/models/',
    '../app/forms/',
    '../app/library/',
    '../app/validators/',
));

$loader->registerNamespaces(array(
    'Transejecutivos\\Misc' => '../app/misc/',
    'Transejecutivos\\Logic' => '../app/logic/',
    'Transejecutivos\\Configuration' => '../app/configuration/',
    'Transejecutivos\\Validators' => '../app/validators/',
    'Transejecutivos\\Plugins' => '../app/plugins/'
        ), true);

// register autoloader
$loader->register();
