<?php

class Controller_Product extends Controller
{

    function __construct ($param)
    {
//        parent::__construct();
        $this->model = new Model_Product($param);
        $this->view = new View();

    }

    function action_index ()
    {

        $data = $this->model->get_data();
        $this->view->generate( 'product_view.php', 'template_view.php', $data );
        $dbh = NULL;
    }
}
