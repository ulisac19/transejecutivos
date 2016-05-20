<?php

class Contry extends Model {

  public $idContry;
  public $name;
    
  
  public function initialize() {
      $this->hasMany("idContry", "State", "idContry");
  }
}
