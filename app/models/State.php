<?php

class State extends Model {

  public $idState;
  public $name;
    
  
  public function initialize() {
      $this->hasMany("idState", "City", "idState");
  }
}
