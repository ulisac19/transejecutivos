<?php

class Servicetypedriver extends Model {

  public $idService_type_driver;
  public $iddriver;
  public $idService_type;

  public function getSource()
  {
  	return "service_type_driver";
  }

  public function initialize() {
  	$this->belongsTo("idService_type", "ServiceType", "idService_type");
    $this->belongsTo("iddriver", "Driver", "iddriver");
  }
}

