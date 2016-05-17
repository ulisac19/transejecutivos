<?php

class Action extends \Phalcon\Mvc\Model {

  public $idAction;
  public $idResource;
  public $name;
  public $createdon;
  public $updatedon;

  public function initialize() {
    $this->belongsTo('idResource', 'Resource', 'idResource');
    $this->hasMany('idAction', 'Allowed', 'idAction');
  }

}
