<?php

class Typedoc extends Model {

  //protected $_source = "type_doc";
	public $idType_doc;
	public $name;

  public function getSource(){
  	return "type_doc";
  }

  public function initialize() {
  	//$this->setSource("type_doc");
  }
}

