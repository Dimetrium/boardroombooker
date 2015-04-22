<?php

class Controller
{
    /**
     * @var View holder of View Controller instance
     */
    protected $view;
    protected $lang;

    /**
     * Constructor
     *
     * Get instance of View Controller
     *
     * @param int from controller category id
     */
    function __construct ()
    {

        $this->view = new View();

    }

    // the action caused the default
    function action_index ()
    {
    }
}
