<?php

class Company extends Model {

  public $idCompany;
  public $name;
  public $agent_name;
  public $agent_lastname;
  public $NIT;
  public $address;
  public $logo;
  public $idCity;
  public $phone1;
  public $phone2;
  public $email1;
  public $email2;
  public $created_date;
  public $edited_date;
  public $createdon;
  public $updatedon;
  public $status;
  
  
  public function initialize() {
      $this->hasMany("idCompany", "Passenger", "idCompany");
      $this->hasMany("idmethod_pay", "Driver", "idmethod_pay");
      $this->belongsTo("idCity", "City", "idCity");
  }
}

