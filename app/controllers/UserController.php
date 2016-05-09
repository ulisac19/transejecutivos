<?php

class UserController extends Controller {

  public function indexAction() {
    
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
