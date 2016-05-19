<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Email,
    Phalcon\Forms\Element\Select,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Check,
    Phalcon\Forms\Element\Button,
    Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Transejecutivos\Validators\SpaceValidator;

class DriverForm extends Form {

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
		// apellidos
	    $address = new TextArea('address', array(
	        'maxlength' => 100,
	        'placeholder' => 'Direccion',
	        'required' => 'required',
	        'class' => 'form-control',
	        'rows' => 5,
	        'id' => 'address'
	    ));
	    $address->setLabel("*Direccion");
	    $address->addValidator(new SpaceValidator(array('message' => 'El campo direccion, se encuentra vacío')));
	    $address->addValidator(new StringLength(array('min' => 10,'messageMinimum' => 'El apellido es demasiado corto, debe tener al menos 10 carateres')));
	    $this->add($address);
		//--------------------------------------------------------------------------------------------------------
		//Dirección de correo eletrónico
	    $email1 = new Email('email1', array(
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
	    $email2 = new Email('email2', array(
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
	    $phone2->setLabel("Teléfono 2");
	    $this->add($phone2);//--------------------------------------------------------------------------------------------------------
	    //Teléfono de contacto 2
	    $phone3 = new Text('phone3', array(
	        'maxlength' => 30,
	        'placeholder' => 'Telefono 3',
	        'class' => 'form-control',
	        'id' => 'phone3'
	    ));
	    $phone3->setLabel("teléfono 3");
	    $this->add($phone3);
	    //--------------------------------------------------------------------------------------------------------
	    //Marca de vehiculo
	    $brand = new Text('brand', array(
	        'maxlength' => 30,
	        'placeholder' => 'Marca del carro',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'brand'
	    ));
	    $brand->setLabel("*Marca");
	    $brand->addValidator(new SpaceValidator(array('message' => 'El campo Marca, no puede estar vacío')));
	    $this->add($brand);
	    //--------------------------------------------------------------------------------------------------------
	    //modelo del vehiculo
	    $color = new Text('color', array(
	        'maxlength' => 30,
	        'placeholder' => 'Color del carro',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'color'
	    ));
	    $color->setLabel("*Color");
	    $color->addValidator(new SpaceValidator(array('message' => 'El campo Color, no puede estar vacío')));
	    $this->add($color); 
	    //--------------------------------------------------------------------------------------------------------
	    //modelo del vehiculo
	    $model = new Text('model', array(
	        'maxlength' => 30,
	        'placeholder' => 'Modelo del carro',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'model'
	    ));
	    $model->setLabel("*Modelo");
	    $model->addValidator(new SpaceValidator(array('message' => 'El campo Modelo, no puede estar vacío')));
	    $this->add($model);
		//--------------------------------------------------------------------------------------------------------
	    //modelo del vehiculo
	    $number = new Text('number', array(
	        'maxlength' => 30,
	        'placeholder' => 'Placa del carro',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'number'
	    ));
	    $number->setLabel("*Placa");
	    $number->addValidator(new SpaceValidator(array('message' => 'El campo placa, no puede estar vacío')));
	    $this->add($number);
		//--------------------------------------------------------------------------------------------------------
		// apellidos
	    $observations = new TextArea('observations', array(
	        'maxlength' => 100,
	        'placeholder' => 'observaciones',
	        'required' => 'required',
	        'class' => 'form-control',
	        'rows' => 5,
	        'id' => 'observations'
	    ));
	    $observations->setLabel("*Observaciones");
	    $observations->addValidator(new SpaceValidator(array('message' => 'El campo observaciones, se encuentra vacío')));
	    $this->add($observations);
		//--------------------------------------------------------------------------------------------------------
	    //Idiomas 
	    $idioma = new Select('idioma1', Language::find(), array(
	        'using' => array('idlanguage', 'name'),
	        'class' => 'form-control select-picker',
	        'id' => 'idioma1'
	    ));
	    $idioma->setLabel("*Idioma 1");
	    $idioma->addValidator(new SpaceValidator(array('message' => 'El campo observaciones, se encuentra vacío')));
	    $this->add($idioma);
	    //--------------------------------------------------------------------------------------------------------
	    //Idiomas 
	    $idioma2 = new Select('idioma2', Language::find(), array(
	        'using' => array('idlanguage', 'name'),
	        'class' => 'form-control select-picker',
	        'id' => 'idioma2'
	    ));
	    $idioma2->setLabel("Idioma 2");
	    $this->add($idioma2);
	    //--------------------------------------------------------------------------------------------------------
	   //Idiomas 
	    $idioma3 = new Select('idioma3', Language::find(), array(
	        'using' => array('idlanguage', 'name'),
	        'class' => 'form-control select-picker',
	        'id' => 'idioma3'
	    ));
	    $idioma3->setLabel("Idioma 2");
	    $this->add($idioma3);
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
		
	    //metodo de pago 
	    $idmethod_pay = new Select('idmethod_pay', Methodpay::find(), array(
	        'using' => array('idmethod_pay', 'name'),
	        'class' => 'form-control select-picker',
	        'id' => 'idmethod_pay'
	    ));
	    $idmethod_pay->setLabel("*Metodo de pago");
	    $this->add($idmethod_pay);
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
		//Estado
	    $status = new Check('status', array(
	        'id' => 'status',
	        'class' => 'switchery',
	        'checked' => 'checked',
	    ));
	    $status->setLabel("*Estado");
	    $this->add($status);
		//--------------------------------------------------------------------------------------------------------

	}

	public function beforeValidation() {}
}