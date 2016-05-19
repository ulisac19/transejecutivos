	<?php

	class Driver extends Model {

	public $iddriver;
	public $name;
	public $lastname;
	public $idcity;
	public $address;
	public $phone1;
	public $phone2;
	public $phone3;
	public $email1;
	public $email2;
	public $brand;
	public $model;
	public $color;
	public $number;
	public $observations;
	public $idmethod_pay;
	public $code;
	public $created_by;
	public $edited_by;
	public $created_date;
	public $edited_date;
	public $status;
	public $idCompany;
	  
	  public function getSource()
	  {
	  	return "driver";
	  }

	  public function initialize() {
	  	$this->belongsTo("idcity", "City", "idcity");
    	$this->belongsTo("idmethod_pay", "Methodpay", "idmethod_pay");
    	$this->belongsTo("idCompany", "Company", "idCompany");

    	$this->hasMany("iddriver", "Languagedriver", "iddriver");
    	$this->hasMany("iddriver", "Picoyplacadrive", "iddriver");
    	$this->hasMany("iddriver", "Doc", "iddriver");
    	$this->hasMany("iddriver", "Servicetypedriver", "iddriver");    
	  }
	}


