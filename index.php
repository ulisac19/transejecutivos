<?php

require_once '../app/autoload.php';

try {
  $app = new \Transejecutivos\Configuration\Services();
  $app->setConfigFilePath("../app/config/configuration.ini");

  $app->load();

  $di = $app->getDi();

  //Handle the request
  $application = new \Phalcon\Mvc\Application($di);
  echo $application->handle()->getContent();
} catch (\Phalcon\Exception $e) {
  echo "PhalconException: ", $e->getMessage() . PHP_EOL;
  echo $e->getTraceAsString();
}
