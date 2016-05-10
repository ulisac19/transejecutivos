<?php

class Model extends \Phalcon\Mvc\Model {

  public function initialize() {
    $this->useDynamicUpdate(true);
  }

  public function beforeValidationOnCreate() {
    $this->createdon = time();
    $this->updatedon = time();
    if (isset($this->email)) {
      $this->email = strtolower($this->email);
    }
  }

  public function beforeValidationOnUpdate() {
    $this->updatedon = time();
    if (isset($this->email)) {
      $this->email = strtolower($this->email);
    }
  }

}