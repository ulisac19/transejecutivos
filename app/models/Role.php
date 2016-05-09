<?php

class Role extends Model {
  public $idRole;
  public $name;
  public $createdon;
  public $updatedon;
  
  public function initialize() {
    $this->hasMany("idRole", "User", "idRole");
  }
}

