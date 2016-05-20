<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Transejecutivos\Validators\SpaceValidator;
use Phalcon\Validation\Validator\Confirmation;

/**
 * Este objeto se usa para crear el formulario en la vista, y phalcon automáticamente lo conecta con el modelo que deseemos, en este caso el modelo de usuario
 * De esta manera evitamos relacionar las variables que vienen del post con los campos de la base de datos. Es importante que los inputs, tengan el mismo nombre
 * de los campos de la tabla user de la base de datos para que este "bind" sea automático.
 */
class PasswordForm extends Form {

  public function initialize() {
    //Nombres
    //1. Creamos un objeto de tipo TEXT de phalcon, que se convertirá en un input tipo text en la vista, añadimos los atributos necesarios
    //como el placeholder, class, etc.
    
    
    
    //Contraseña anterior
    $password_before = new Password('password_before', array(
        'maxlength' => 20,
        'placeholder' => 'Contraseña Anterior',
        'required' => 'required',
        'class' => 'form-control',
        'id' => 'password_before'
    ));
    
    $password_before->setLabel("*Contraseña Anterior");
    $password_before->addValidator(new SpaceValidator(array('message' => 'El campo «contraseña anterior» no puede estar vacío')));
    $password_before->addValidator(new StringLength(array('min' => 6,'messageMinimum' => 'La contraseña es demasiado corta, debe tener al menos 6 carateres')));
    $this->add($password_before);

    //Contraseña nueva
    $password = new Password('password', array(
        'maxlength' => 20,
        'placeholder' => 'Contraseña nueva',
        'required' => 'required',
        'class' => 'form-control',
        'id' => 'password'
    ));
    
    $password->setLabel("*Contraseña nueva");
    $password->addValidator(new SpaceValidator(array('message' => 'El campo «contraseña nueva» no puede estar vacío')));
    $password->addValidator(new StringLength(array('min' => 6,'messageMinimum' => 'La contraseña es demasiado corta, debe tener al menos 6 carateres')));
    $this->add($password);

    //Contraseña nueva repetir
    $password_repeat = new Password('password_repeat', array(
        'maxlength' => 20,
        'placeholder' => 'Repita la contraseña',
        'required' => 'required',
        'class' => 'form-control',
        'id' => 'password_repeat'
    ));
    
    $password_repeat->setLabel("*Repita la contraseña");
    $password_repeat->addValidator(new SpaceValidator(array('message' => 'El campo «contraseña no puede estar vacío')));
    $password_repeat->addValidator(new StringLength(array('min' => 6,'messageMinimum' => 'La contraseña es demasiado corta, debe tener al menos 6 carateres')));

    $password_repeat->addValidator(new Confirmation(array('message' => 'Password doesn\'t match confirmation', 'with' => 'password' )));
    $this->add($password_repeat);

  }

  public function beforeValidation() {
  }
}
