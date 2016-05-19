<?php

class Doc extends Model {

	public $idDoc;
	public $name;
	public $description;
	public $number;
	public $pdf;
	public $date_e;
	public $date_v;
	public $alert;
	public $idType_doc;
	public $iddriver;
  
  public function getSource()
  {
  	return "doc";
  }

  public function initialize() {
  	$this->belongsTo("idType_doc", "Typedoc", "idType_doc");
  	$this->belongsTo("iddriver", "Driver", "iddriver");
  }
}

