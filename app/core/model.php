<?php

class Model
{
    /**
     * @var DBConnect instance holder
     */
    protected $dbh;
    protected $param;

    /**
     * Constructor
     * Get instance of DBConnect class
     */
    public function __construct ($param)
    {
        $this->param = $param;

        $this->dbh = DBConnect::getInstance();

    }

    // get data method
    public function get_data ()
    {
    }
}