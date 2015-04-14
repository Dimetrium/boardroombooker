<?php

class Controller_Category extends Controller
{

    function __construct ($param)
    {

        $this->model = new Model_Category($param);
        $this->view = new View();

    }

    function action_index ()
    {
    }

    function action_genre ()
    {

        $data = $this->model->getByGenre();
        $this->view->generate( 'category_view.php', 'template_view.php', $data );
        $dbh = null;
    }

    function action_author ()
    {

        $data = $this->model->getByAuthor();
        $this->view->generate( 'category_view.php', 'template_view.php', $data );
        $dbh = null;
    }
}
