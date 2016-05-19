<?php

class Languagedriver extends Model {


	public $idlanguage_driver;
	public $iddriver;
	public $idlanguage;

  public function getSource(){
  	return "language_driver";
  }

  public function initialize() {
  	$this->belongsTo("iddriver", "Driver", "iddriver");
  }
}


