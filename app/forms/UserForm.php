<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Email,
    Phalcon\Forms\Element\Select,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Check;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Transejecutivos\Validators\SpaceValidator;

/**
 * Este objeto se usa para crear el formulario en la vista, y phalcon automáticamente lo conecta con el modelo que deseemos, en este caso el modelo de usuario
 * De esta manera evitamos relacionar las variables que vienen del post con los campos de la base de datos. Es importante que los inputs, tengan el mismo nombre
 * de los campos de la tabla user de la base de datos para que este "bind" sea automático.
 */
class UserForm extends Form {

  public function initialize() {
    //Nombres
    //1. Creamos un objeto de tipo TEXT de phalcon, que se convertirá en un input tipo text en la vista, añadimos los atributos necesarios
    //como el placeholder, class, etc.
    $name = new Text('name', array(
        'maxlength' => 100,
        'placeholder' => 'Nombres',
        'required' => 'required',
        'class' => 'form-control',
        'autofocus' => 'autofocus',
        'id' => 'name',
    ));
    //2. Agregamos una etiqueta para mostrar en el formulario de la vista
    $name->setLabel("*Nombres");
    //3. Ahora añadimos validadores de Phalcon php, estos se encargan de validar que los valores ingresados en los campos por el usuario sean correctos.
    $name->addValidator(new SpaceValidator(array('message' => 'El campo nombre se encuentra vacío')));
    $name->addValidator(new StringLength(array('min' => 2,'messageMinimum' => 'El nombre es demasiado corto, debe tener al menos 2 carateres')));
    //4. Agregamos el objeto de tipo TEXT a una lista de campos, para luego hacer la respectiva llamada en la vista.
    $this->add($name);

    //Apellidos
    $lastname = new Text('lastname', array(
        'maxlength' => 100,
        'placeholder' => 'Apellidos',
        'required' => 'required',
        'class' => 'form-control',
        'id' => 'lastname'
    ));
    $lastname->setLabel("*Apellidos");
    $lastname->addValidator(new SpaceValidator(array('message' => 'El campo apellido, se encuentra vacío')));
    $lastname->addValidator(new StringLength(array('min' => 2,'messageMinimum' => 'El apellido es demasiado corto, debe tener al menos 2 carateres')));
    $this->add($lastname);
    
    //Dirección de correo eletrónico
    $email = new Email('email', array(
        'maxlength' => 100,
        'placeholder' => 'Dirección de correo eléctronico',
        'required' => 'required',
        'class' => 'form-control',
        'id' => 'email'
    ));
    $email->setLabel("*Dirección de correo electrónico");
    $email->addValidator(new EmailValidator(array('message' => 'Debes enviar un correo válido para el usuario')));
    $this->add($email);

    //Teléfo de contacto 1
    $phone1 = new Text('phone1', array(
        'maxlength' => 30,
        'placeholder' => 'Telefono de Contacto 1',
        'required' => 'required',
        'class' => 'form-control',
        'id' => 'phone1'
    ));
    $phone1->setLabel("*Teléfono de Contacto 1");
    $phone1->addValidator(new SpaceValidator(array('message' => 'El campo Teléfono de contacto 1, no puede estar vacío')));
    $phone1->addValidator(new StringLength(array('min' => 7,'messageMinimum' => 'El número de teléfono es demasiado corto, debe tener al menos 7 carateres')));
    $this->add($phone1);

    //Teléfo de contacto 2
    $phone2 = new Text('phone2', array(
        'maxlength' => 30,
        'placeholder' => 'Telefono de Contacto 2',
        'class' => 'form-control',
        'id' => 'phone2'
    ));
    $phone2->setLabel("Teléfono de Contacto 2");
    $this->add($phone2);
    
    //Dirección
    $address = new Text('address', array(
        'maxlength' => 100,
        'placeholder' => 'Dirección',
        'required' => 'required',
        'class' => 'form-control',
        'id' => 'address'
    ));
    $address->setLabel("*Dirección");
    $address->addValidator(new SpaceValidator(array('message' => 'El campo dirección, no puede estar vacía')));
    $address->addValidator(new StringLength(array('min' => 8,'messageMinimum' => 'La dirección es demasiada corta, debe tener al menos 8 carateres')));
    $this->add($address);

    //Role o tipo de usuario
    $idRole = new Select('idRole', Role::find(), array(
        'using' => array('idRole', 'name'),
        'class' => 'form-control select-picker',
        'id' => 'idRole'
    ));
    $idRole->setLabel("*Role o Tipo de Usuario");
    $this->add($idRole);
    
    //Contraseña
    $password = new Text('password', array(
        'maxlength' => 100,
        'placeholder' => 'Contraseña',
        'required' => 'required',
        'class' => 'form-control',
        'value' => uniqid(),
        'id' => 'password'
    ));
    
    $password->setLabel("*Contraseña");
    $password->addValidator(new SpaceValidator(array('message' => 'El campo contraseña no puede estar vacío')));
    $password->addValidator(new StringLength(array('min' => 6,'messageMinimum' => 'La contraseña es demasiado corta, debe tener al menos 6 carateres')));
    $this->add($password);

    //Estado
    $status = new Check('status', array(
        'id' => 'status',
        'class' => 'switchery',
        'checked' => 'checked',
    ));
    $status->setLabel("*Estado");
    $this->add($status);
  }

  public function beforeValidation() {
    $status = $this->get("status");
    $attributes = $status->getAttributes();
    $attributes['value'] = (empty($attributes['value']) ? 0 : 1);
    $status->setAttributes($attributes);
  }
}
