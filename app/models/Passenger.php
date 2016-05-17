<?php

class Passenger extends Model {

   public $idPassenger;
   public $name;
   public $lastname;
   public $idCompany;
   public $phone1;
   public $phone2;
   public $idCity;
   public $contact;
   public $contact_phone1;
   public $contact_phone2;
   public $mail1;
   public $mail2;
   public $code;
   public $created_by;
   public $edited_by;
   public $created_date;
   public $edited_date;
   public $address;
   public $observations;
  
  
  public function initialize() {
    $this->belongsTo("idCity", "City", "idCity");
    $this->belongsTo("idCompany", "Company", "idCompany");
  }
  
  /*
  public function validation() {
    $this->validate(new Uniqueness(array(
        "field" => "email",
        "message" => "El correo electrónico ingresado, ya se encuentra registrado en la plataforma"
    )));
    if ($this->validationHasFailed() == true) {
      return false;
    }
  }
  */
}
