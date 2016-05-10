<?php

class User extends Model {

  public $idUser;
  public $idRole;
  public $name;
  public $lastname;
  public $email;
  public $phone1;
  public $phone2;
  public $address;
  public $password;
  public $status;
  public $createdon;
  public $updatedon;

  public function initialize() {
    $this->belongsTo("idRole", "Role", "idRole");
  }

  public function validation() {
    $this->validate(new Uniqueness(array(
        "field" => "email",
        "message" => "El correo electrónico ingresado, ya se encuentra registrado en la plataforma"
    )));
    if ($this->validationHasFailed() == true) {
      return false;
    }
  }
}
