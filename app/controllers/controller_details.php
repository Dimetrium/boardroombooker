<?php

class Controller_Details extends Controller
{

  private $id;

  function __construct ( $param_one = null, $param_two = null )
  {
    $this->id = $param_one;
    $this->view = new View();
    $this->model = new Model_Details();

  }

  function action_index ()
  {

    $result= $this->model->getEvent($this->id);
    $this->view->generate('details_view.php', 'template_view.php', $result);

  }

  public function action_update()
  {

    //        $this->model->addEvent($event);

  }

  public function action_delete()
  {

    //        $this->model->addEvent($event);

  }

}





