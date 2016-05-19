<?php
class DriverController extends Controller {

  	public function indexAction() {

    $currentPage = (int) $_GET["page"];
    $n = $_GET["name"];
    $name = explode(" ", $n);

    $builder = $this->modelsManager->createBuilder()
        ->from('driver')
        ->orderBy('driver.created_date');

    if (!empty($name[0]))
    {
       	$builder->where('driver.name LIKE :name:', array('name' => "%{$name[0]}%"));
    }
      
    if (!empty($name[1]))
    {
    	$builder->orWhere('driver.lastname LIKE :lastname:', array('lastname' => "%{$name[1]}%"));
    }

    $this->view->setVar("page", $this->getPaginationWithQueryBuilder($builder, $currentPage));

    $this->view->setVar("name", $n);
  }


    public function newAction() {
    $form = new DriverForm();
    
    $this->view->setVar("form", $form);


    if ($this->request->isPost()) {
      try {
        $passenger = new Passenger();
        $form->bind($this->request->getPost(), $passenger);
        $mail1 = $form->getValue('email1');
        $passenger->code = $this->hash->hash($mail1);
        $passenger->created_date = date('Y-m-d');

        if ($this->saveModel($form, $passenger, "Se ha creado el usuario exitosamente")) {
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