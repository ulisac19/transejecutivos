<?php

class Language extends Model {


	public $idlanguage;
	public $name;

  public function getSource(){
  	return "language";
  }

  public function initialize() {

  }
}

