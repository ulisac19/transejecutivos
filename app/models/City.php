<?php

class City extends Model {

  public $idCity;
  public $name;
  public $idState;

  
  
  public function initialize() {
      $this->belongsTo("idState", "State", "idState");
      $this->hasMany("idCity", "Passenger", "idCity");
      $this->hasMany("idCity", "Driver", "idCity");
      $this->hasMany("idCity", "Company", "idCity");
  }
}

