<?php

class Model extends \Phalcon\Mvc\Model {

  public function initialize() {
    $this->useDynamicUpdate(true);
  }

  public function beforeValidationOnCreate() {
    $this->createdon = time();
    $this->updatedon = time();
  }

  public function beforeValidationOnUpdate() {
    $this->updatedon = time();
  }

}