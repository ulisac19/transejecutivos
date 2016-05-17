<?php

class Allowed extends \Phalcon\Mvc\Model {

  public $idAllowed;
  public $idRole;
  public $idAction;
  public $createdon;

  public function initialize() {
    $this->belongsTo('idRole', 'Role', 'idRole');
    $this->belongsTo('idAction', 'Action', 'idAction');
  }

}
