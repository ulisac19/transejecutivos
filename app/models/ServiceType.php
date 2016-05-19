<?php

class ServiceType extends Model {

  public $idService_type;
  public $name;
  public $description;

  public function getSource()
  {
  	return "service_type";
  }

  public function initialize() {
  	$this->hasMany("idService_type", "Servicetypedriver", "idService_type");
  }
}



