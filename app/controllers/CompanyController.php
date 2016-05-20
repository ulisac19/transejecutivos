
<?php
class CompanyController extends Controller {

  	public function indexAction() {

    $currentPage = (int) $_GET["page"];
    $n = $_GET["name"];
    $name = explode(" ", $n);

    $builder = $this->modelsManager->createBuilder()
        ->from('company')
        ->orderBy('company.created_date');

    if (!empty($name[0]))
    {
       	$builder->where('company.name LIKE :name:', array('name' => "%{$name[0]}%"));
    }
      
    if (!empty($name[1]))
    {
    	$builder->orWhere('company.lastname LIKE :lastname:', array('lastname' => "%{$name[1]}%"));
    }

    $this->view->setVar("page", $this->getPaginationWithQueryBuilder($builder, $currentPage));

    $this->view->setVar("name", $n);
  }


    public function newAction() {
    $form = new CompanyForm();
    
    $this->view->setVar("form", $form);


    if ($this->request->isPost()) {
      try {
        $company = new Company();
        $form->bind($this->request->getPost(), $company);
        $company->created_date = date('Y-m-d');

        if ($this->saveModel($form, $company, "Se ha creado la compañia exitosamente")) {
          return $this->response->redirect("company");
        }        
      } catch (InvalidArgumentException $ex) {
        $this->message->error($ex->getMessage());
      } catch (Exception $ex) {
        $this->message->error("Ha ocurrido un error, por favor contacta al administrador");
        $this->logger->log("Exception while creating company: " . $ex->getMessage());
        $this->logger->log($ex->getTraceAsString());
      }
    }
  }
  
  public function getstatesAction($idContry){
  	
  	if($idContry != "")
  	{	
	  	$states =  State::find('idContry = '.$idContry)->toArray();
	  	$cad = '<div class="form-group"><label for="idState" class="col-sm-4 control-label">Departamento</label><div class="col-sm-8"><select id="idState" name="idState" class="form-control select-picker">
	  	<option value="0">Seleccione un departamento</option>';
	  	foreach ($states as $val) {
	  		$cad = $cad."<option value='".$val['idState']."'>".$val['name']."</option>";
	  	}
	  	$cad = $cad.'</select></div></div>';
	  	echo $cad;	
  	}
  }

  public function getcityAction($idState){
  	
  	if($idState != "")
  	{	
	  	$states =  City::find('idState = '.$idState)->toArray();
	  	$cad = '<div class="form-group"><label for="idCity" class="col-sm-4 control-label">Departamento</label><div class="col-sm-8"><select id="idCity" name="idCity" class="form-control select-picker">
	  	<option value="0">Seleccione un departamento</option>';
	  	foreach ($states as $val) {
	  		$cad = $cad."<option value='".$val['idCity']."'>".$val['name']."</option>";
	  	}
	  	$cad = $cad.'</select></div></div>';
	  	echo $cad;	
  	}
  }

/*
  
  public function updateAction($id) {
    $passenger = Passenger::findFirst(array("conditions" => "idPassenger = ?0", "bind" => array($id)));
    $this->validateModel($passenger, "No se encontró el Pasajero", "passenger");
    
    $form = new PassengerForm($passenger);
    $this->view->setVar("form", $form);
    $this->view->setVar("passenger", $passenger);
    
    if ($this->request->isPost()) {
      try {
        $form->bind($this->request->getPost(), $passenger);
        $mail1 = $form->getValue('mail1');
        $passenger->code = $this->hash->hash($mail1);
        $passenger->edited_date = date('Y-m-d');

        if ($this->saveModel($form, $passenger, "Se ha editado el usuario exitosamente")) {
          return $this->response->redirect("passenger");
        }
      } catch (InvalidArgumentException $ex) {
        $this->message->error($ex->getMessage());
      } catch (Exception $ex) {
        $this->message->error("Ha ocurrido un error, por favor contacta al administrador");
        $this->logger->log("Exception while creating passenger: " . $ex->getMessage());
        $this->logger->log($ex->getTraceAsString());
      }
    }
  }
*/

}