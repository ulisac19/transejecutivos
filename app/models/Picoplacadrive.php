<?php

class Picoyplaca extends Model {

	public $idpico_placa_drive;
	public $idpicoyplaca;
	public $iddriver;

  public function getSource(){
  	return "pico_placa_drive";
  }

  public function initialize() {

  }
}



