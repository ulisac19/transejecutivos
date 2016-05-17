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

class PassengerForm extends Form {

	public function initialize() {
		//--------------------------------------------------------------------------------------------------------
		// nombres
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
		//--------------------------------------------------------------------------------------------------------
		// apellidos
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
		//--------------------------------------------------------------------------------------------------------
		//Dirección de correo eletrónico
	    $email1 = new Email('mail1', array(
	        'maxlength' => 100,
	        'placeholder' => 'Dirección de correo eléctronico',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'email1'
	    ));
	    $email1->setLabel("*Dirección de correo electrónico");
	    $email1->addValidator(new EmailValidator(array('message' => 'Debes enviar un correo válido para el usuario')));
	    $this->add($email1);
		//--------------------------------------------------------------------------------------------------------//Dirección de correo eletrónico
	    $email2 = new Email('mail2', array(
	        'maxlength' => 100,
	        'placeholder' => 'Dirección de correo eléctronico',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'email2'
	    ));
	    $email2->setLabel("*Dirección de correo electrónico alternativa");
	    $email2->addValidator(new EmailValidator(array('message' => 'Debes enviar un correo válido para el usuario')));
	    $this->add($email2);
		//--------------------------------------------------------------------------------------------------------
	    //Teléfono de contacto 1
	    $phone1 = new Text('phone1', array(
	        'maxlength' => 30,
	        'placeholder' => 'Telefono de Contacto 1',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'phone1'
	    ));
	    $phone1->setLabel("*Teléfono 1");
	    $phone1->addValidator(new SpaceValidator(array('message' => 'El campo Teléfono 1, no puede estar vacío')));
	    $phone1->addValidator(new StringLength(array('min' => 7,'messageMinimum' => 'El número de teléfono es demasiado corto, debe tener al menos 7 carateres')));
	    $this->add($phone1);
		//--------------------------------------------------------------------------------------------------------
	    //Teléfono de contacto 2
	    $phone2 = new Text('phone2', array(
	        'maxlength' => 30,
	        'placeholder' => 'Telefono 2',
	        'class' => 'form-control',
	        'id' => 'phone2'
	    ));
	    $phone2->setLabel("teléfono 2");
	    $this->add($phone2);
		//--------------------------------------------------------------------------------------------------------
		//Teléfono de contacto 1
	    $contact_phone1 = new Text('contact_phone1', array(
	        'maxlength' => 30,
	        'placeholder' => 'Telefono de Contacto 1',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'contact_phone1'
	    ));
	    $contact_phone1->setLabel("*Teléfono de Contacto 1");
	    $contact_phone1->addValidator(new SpaceValidator(array('message' => 'El campo Teléfono de contacto 1, no puede estar vacío')));
	    $contact_phone1->addValidator(new StringLength(array('min' => 7,'messageMinimum' => 'El número de teléfono es demasiado corto, debe tener al menos 7 carateres')));
	    $this->add($contact_phone1);
		//--------------------------------------------------------------------------------------------------------
	    //Teléfono de contacto 2
	    $contact_phone2 = new Text('contact_phone2', array(
	        'maxlength' => 30,
	        'placeholder' => 'Telefono de Contacto 2',
	        'class' => 'form-control',
	        'id' => 'contact_phone2'
	    ));
	    $contact_phone2->setLabel("Teléfono de Contacto 2");
	    $this->add($contact_phone2);
		//--------------------------------------------------------------------------------------------------------
	    //Ciudades 
	    $idCity = new Select('idcity', City::find(), array(
	        'using' => array('idcity', 'name'),
	        'class' => 'form-control select-picker',
	        'id' => 'idCity'
	    ));
	    $idCity->setLabel("*Ciudad");
	    $this->add($idCity);
		//--------------------------------------------------------------------------------------------------------  
		// compañias 
	    $idCompany = new Select('idCompany', Company::find(), array(
	        'using' => array('idCompany', 'name'),
	        'class' => 'form-control select-picker',
	        'id' => 'idCompany'
	    ));
	    $idCompany->setLabel("*Empresa");
	    $this->add($idCompany);
		//--------------------------------------------------------------------------------------------------------

	}

	public function beforeValidation() { /*
    $status = $this->get("status");
    $attributes = $status->getAttributes();
    $attributes['value'] = (empty($attributes['value']) ? 0 : 1);
    $status->setAttributes($attributes);*/
  }
}