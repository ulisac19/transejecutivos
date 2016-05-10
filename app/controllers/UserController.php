<?php

class UserController extends Controller {

  public function indexAction() {
    $currentPage = (int) $_GET["page"];
    $idRole = (int) $_GET["role"];
    $n = $_GET["name"];
    $name = explode(" ", $n);
    
    
    
    $builder = $this->modelsManager->createBuilder()
        ->from('User')
        ->leftJoin('Role')
        ->orderBy('User.createdon');
    
    if (!empty($idRole)) {
      $builder->where('User.idRole = :idRole:', array('idRole' => $idRole));
      if (!empty($name[0])) {
        $builder->andWhere('User.name LIKE :name:', array('name' => "%{$name[0]}%"));
      }
      
      if (!empty($name[1])) {
        $builder->orWhere('User.lastname LIKE :lastname:', array('lastname' => "%{$name[1]}%"));
      }
    }
    else {
      if (!empty($name[0])) {
        $builder->where('User.name LIKE :name:', array('name' => "%{$name[0]}%"));
      }
      
      if (!empty($name[1])) {
        $builder->orWhere('User.lastname LIKE :lastname:', array('lastname' => "%{$name[1]}%"));
      }
    }
    
    $this->view->setVar("page", $this->getPaginationWithQueryBuilder($builder, $currentPage));
    
    $roles = Role::find();
    $this->view->setVar("roles", $roles);
    $this->view->setVar("idRole", $idRole);
    $this->view->setVar("name", $n);
  }

  public function newAction() {
    $form = new UserForm();
    
    $this->view->setVar("form", $form);

    if ($this->request->isPost()) {
      try {
        $user = new User();
        $form->bind($this->request->getPost(), $user);
        $status = $form->getValue('status');
        $password = $form->getValue('password');
        $user->status = (empty($status) ? 0 : 1);
        $user->password = $this->hash->hash($password);

        if ($this->saveModel($form, $user, "Se ha creado el usuario exitosamente")) {
          return $this->response->redirect("user");
        }
      } catch (InvalidArgumentException $ex) {
        $this->message->error($ex->getMessage());
      } catch (Exception $ex) {
        $this->message->error("Ha ocurrido un error, por favor contacta al administrador");
        $this->logger->log("Exception while creating user: " . $ex->getTraceAsString());
        $this->logger->log($ex->getTraceAsString());
      }
    }
  }

}
