<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Email,
    Phalcon\Forms\Element\Select,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Check,
    Phalcon\Forms\Element\Button,
    Phalcon\Forms\Element\File,
    Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Transejecutivos\Validators\SpaceValidator;

class CompanyForm extends Form {

	public function initialize() {
		
		//--------------------------------------------------------------------------------------------------------
		// nombre de la empresa
	    $name_company = new Text('name', array(
	        'maxlength' => 200,
	        'placeholder' => 'Nombre de la empresa',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'name'
	    ));
	    $name_company->setLabel("*Nombre de la empresa");
	    $name_company->addValidator(new SpaceValidator(array('message' => 'El campo «nombre», se encuentra vacío')));
	    $name_company->addValidator(new StringLength(array('min' => 2,'messageMinimum' => 'El «nombre» es demasiado corto, debe tener al menos 2 carateres')));
	    $this->add($name_company);
	    //--------------------------------------------------------------------------------------------------------
		// nombres
	    $name = new Text('name_agent', array(
	        'maxlength' => 80,
	        'placeholder' => 'Nombres de persona contacto',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'name'
	    ));
	    $name->setLabel("*Nombres de persona contacto");
	    $name->addValidator(new SpaceValidator(array('message' => 'El campo «nombres», se encuentra vacío')));
	    $name->addValidator(new StringLength(array('min' => 2,'messageMinimum' => 'El «nombres» es demasiado corto, debe tener al menos 2 carateres')));
	    $this->add($name);
	    //--------------------------------------------------------------------------------------------------------
		// apellidos
	    $lastname = new Text('lastname_agent', array(
	        'maxlength' => 80,
	        'placeholder' => 'Apellidos de persona contacto',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'lastname'
	    ));
	    $lastname->setLabel("*Apellidos de persona contacto");
	    $lastname->addValidator(new SpaceValidator(array('message' => 'El campo «apellido», se encuentra vacío')));
	    $lastname->addValidator(new StringLength(array('min' => 5,'messageMinimum' => 'El «apellido» es demasiado corto, debe tener al menos 5 carateres')));
	    $this->add($lastname);
	    //--------------------------------------------------------------------------------------------------------
		// NIT
	    $NIT = new Text('NIT', array(
	        'maxlength' => 80,
	        'placeholder' => 'Ingrese NIT',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'NIT'
	    ));
	    $NIT->setLabel("*NIT");
	    $NIT->addValidator(new SpaceValidator(array('message' => 'El campo «NIT», se encuentra vacío')));
	    $this->add($NIT);//--------------------------------------------------------------------------------------------------------
		// email1
	    $email1 = new Text('email1', array(
	        'maxlength' => 80,
	        'placeholder' => 'Ingrese correo principal',
	        'required' => 'required',
	        'class' => 'form-control',
	        'id' => 'email1'
	    ));
	    $email1->setLabel("*Correo");
	    $email1->addValidator(new SpaceValidator(array('message' => 'El campo «correo principal», se encuentra vacío')));
	    $this->add($email1);
	    //------------------------------------------------------------------------------------------------------
		// email2
	    $email2 = new Text('email2', array(
	        'maxlength' => 80,
	        'placeholder' => 'Ingrese correo alternativo',
	        'class' => 'form-control',
	        'id' => 'email2'
	    ));
	    $email2->setLabel("Correo alternativo");
	    $this->add($email2);
		//--------------------------------------------------------------------------------------------------------
		// direccion
	    $address = new TextArea('address', array(
	        'maxlength' => 100,
	        'placeholder' => 'Direccion',
	        'required' => 'required',
	        'class' => 'form-control',
	        'rows' => 5,
	        'id' => 'address'
	    ));
	    $address->setLabel("Direccion");
	    $address->addValidator(new SpaceValidator(array('message' => 'El campo direccion, se encuentra vacío')));
	   
	    $this->add($address);
		//--------------------------------------------------------------------------------------------------------  
		// logo
	    $logo = new File('logo', array(
	        'class' => 'form-control',
	        'id' => 'logo'
	    ));
	    $logo->setLabel("Logo");
	    $this->add($logo);
		//--------------------------------------------------------------------------------------------------------  
	    $idContry = new Select('idContry', [], array(
	        'using' => array('idContry', 'name'),
	        'class' => 'form-control',
	        'id' => 'idContry',
	        'emptyText' => 'Seleccione un pais',
	        'useEmpty'=> true
	    ));
	    $idContry->setLabel("Pais");
	    $idContry->setOptions(Contry::find());
	    $this->add($idContry);
	    //--------------------------------------------------------------------------------------------------------  
	    $idState = new Select('idState', [], array(
	        'using' => array('idState', 'name'),
	        'class' => 'form-control ',
	        'id' => 'idState'
	    ));
	    $idState->setOptions(['Seleccione un estado'=>'Seleccione un departamento']);
	    $idState->setLabel("Departamento");
	    $idState->setName("idState");
	    $this->add($idState);
	    //--------------------------------------------------------------------------------------------------------  
	    $idCity = new Select('idCity', [], array(
	        'using' => array('idCity', 'name'),
	        'class' => 'form-control ',
	        'id' => 'idCity'
	    ));
	    $idCity->setOptions(['Seleccione un ciudad'=>'Seleccione un ciudad']);
	    $idCity->setLabel("*Ciudad");
	    $idCity->addValidator(new SpaceValidator(array('message' => 'El campo direccion, se encuentra vacío')));
	    $this->add($idCity);
		//--------------------------------------------------------------------------------------------------------
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