	<?php

	class Methodpay extends Model {

	public $idmethod_pay;
	public $name;
	public $description;
	public $extra;
	  
	  public function getSource()
	  {
	  	return "method_pay";
	  }

	  public function initialize() {
	  }
	}


