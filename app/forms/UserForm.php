<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Email,
    Phalcon\Forms\Element\Select,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Check;
use Phalcon\Validation\Validator\PresenceOf;
use Transejecutivos\Validators\SpaceValidator;

class UserForm extends Form {

  public function initialize() {
    $name = new Text('name', array(
        'maxlength' => 100,
        'placeholder' => 'Nombres',
        //'required' => 'required',
        'class' => 'form-control',
        'id' => '*Nombres',
    ));

    //Validations
    $name->addValidator(new PresenceOf(array(
      'message' => 'Debes ingresar un nombre para el usuario'
    )));

    $name->addValidator(new SpaceValidator(array(
      'min' => 2,
      'messageMinimum' => 'El nombre es demasiado corto, debe tener al menos 2 carateres'
    )));

    $this->add($name);


    $this->add(new Text('lastname', array(
        'maxlength' => 100,
        'placeholder' => 'Apellidos',
        'required' => 'required',
        'class' => 'form-control',
        'id' => '*Apellidos'
    )));

    $this->add(new Email('email', array(
        'maxlength' => 100,
        'placeholder' => 'Dirección de correo eléctronico',
        'required' => 'required',
        'class' => 'form-control',
        'id' => '*Email'
    )));

    $this->add(new Text('phone1', array(
        'maxlength' => 30,
        'placeholder' => 'Telefono de Contacto 1',
        'required' => 'required',
        'class' => 'form-control',
        'id' => '*Telefono de Contacto 1'
    )));

    $this->add(new Text('phone2', array(
        'maxlength' => 30,
        'placeholder' => 'Telefono de Contacto 2',
        'class' => 'form-control',
        'id' => 'Telefono de Contacto 2'
    )));

    $this->add(new Text('address', array(
        'maxlength' => 100,
        'placeholder' => 'Dirección',
        'required' => 'required',
        'class' => 'form-control',
        'id' => '*Dirección'
    )));

    $this->add(new Select('idRole', Role::find(), array(
        'using' => array('idRole', 'name'),
        'class' => 'form-control select-picker',
        'id' => '*Role'
    )));

    $this->add(new Password('password', array(
        'maxlength' => 100,
        'placeholder' => 'Contraseña',
        'required' => 'required',
        'class' => 'form-control',
        'id' => '*Contraseña'
    )));

    $this->add(new Check('status', array(
        'value' => 1,
        'id' => 'status',
        'class' => 'switchery',
        'checked' => 'checked',
        'id' => '*Estado'
    )));
  }

}
