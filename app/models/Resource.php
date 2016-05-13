<?php

class Resource extends \Phalcon\Mvc\Model {

  public $idResource;
  public $name;
  public $createdon;
  public $updatedon;

  public function initialize() {
    $this->hasMany('idResource', 'Action', 'idResource');
  }

}
