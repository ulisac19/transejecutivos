<?php

require_once realpath(dirname(__FILE__)) . '/app/autoload.php';

try {
  $app = new \Transejecutivos\Configuration\Services();
  $app->setConfigFilePath(realpath(dirname(__FILE__)) . "/app/config/configuration.ini");

  $app->load();

  $di = $app->getDi();

  //Handle the request
  $application = new \Phalcon\Mvc\Application($di);
  echo $application->handle()->getContent();
} catch (\Phalcon\Exception $e) {
  echo "PhalconException: ", $e->getMessage() . PHP_EOL;
  echo $e->getTraceAsString();
}
