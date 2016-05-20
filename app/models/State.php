<?php

class State extends Model {

  public $idState;
  public $name;
  public $idContry;  
  
  public function initialize() {
      $this->hasMany("idState", "City", "idState");
      $this->belongsTo("idContry", "Contry", "idContry");
  }
}
