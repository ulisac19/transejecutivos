<?php

class Company extends Model {

  public $idCompany;
  public $name;
  public $createdon;
  public $updatedon;
  
  
  public function initialize() {
      $this->hasMany("idCompany", "Passenger", "idCompany");
  }
}

