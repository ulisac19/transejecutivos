<?php

namespace Transejecutivos\Wrappers;

class BaseWrapper {

  public $logger;
  public $message;
  public $modelsManager;
  public $db;
  public $data;

  public function __construct() {
    $this->logger = \Phalcon\DI::getDefault()->get('logger');
    $this->db = \Phalcon\DI::getDefault()->get('db');
    $this->modelsManager = \Phalcon\DI::getDefault()->get('modelsManager');
  }

  public function setData($data = null) {
    if ($data == null || !\is_object($data)) {
      throw new \Exception("Invalid data..");
    }

    $this->data = $data;
  }

  public function setMessage($message) {
    $this->message = $message;
  }

  public function getMessage() {
    return $this->message;
  }

}
