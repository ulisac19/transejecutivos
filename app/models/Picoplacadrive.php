<?php

class Picoyplacadrive extends Model {

	public $idpico_placa_drive;
	public $idpicoyplaca;
	public $iddriver;

  public function getSource(){
  	return "pico_placa_drive";
  }

  public function initialize() {
  	$this->belongsTo("idpicoyplaca", "Picoyplaca", "idpicoyplaca");
  	$this->belongsTo("iddriver", "Driver", "iddriver");
  }
}



