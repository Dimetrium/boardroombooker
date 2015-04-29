<?php

class Model
{
    /**
     * @var DBConnect instance holder
     */
    protected $dbh;
    protected $param_one;

    /**
     * Constructor
     * Get instance of DBConnect class
     */
    public function __construct ( $param_one = null )
    {
        if ( null !== $param_one ) {
            $this->$param_one = $param_one;
        }

        $this->dbh = DBConnect::getInstance();

    }

    // get data method
    public function get_data ()
    {
    }
}