<?php

class Picoyplaca extends Model {

	public $idpicoyplaca;
	public $rango;

  public function getSource(){
  	return "picoyplaca";
  }

  public function initialize() {
  	$this->hasMany("idpicoyplaca", "Picoyplacadrive", "idpicoyplaca");
  }
}

