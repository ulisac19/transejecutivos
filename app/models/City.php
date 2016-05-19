<?php

class City extends Model {

  public $idCity;
  public $name;
  
  
  public function initialize() {
      $this->belongsTo("idState", "State", "idState");
      $this->hasMany("idCity", "Passenger", "idCity");
      $this->hasMany("idCity", "Driver", "idCity");
  }
}

