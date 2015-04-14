<?php

/**
 * Created by PhpStorm.
 * User: Demitry
 * Date: 07.04.2015
 * @return dbh
 */
class DBConnect
{
    private $dbh;

    // Store the single instance.
    private static $instance;

    /**
     * Constructor
     *
     * @param PDO_DSN , PDO_USER, PDO_PASSWORD set's in config.php
     */
    private function __construct ()
    {

        try {
            $this->dbh = new PDO ( PDO_DSN, PDO_USER, PDO_PASSWORD );
            $this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch ( PDOException $e ) {
            echo "Database Error: " . $e->getMessage() . "<br>";
        } catch ( Exception $e ) {
            echo "General Error:" . $e->getMessage() . "<br>";
        }

    }

    /**
     * Get an instance of the Database/
     * @return DBConnect
     */
    static public function getInstance ()
    {
        if ( !self::$instance ) {
            self::$instance = new DBConnect();
        }
        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function getConnection ()
    {
        return $this->dbh;
    }

    public function getRow ( $query, $params = array() )
    {
        try {
            $stmt = $this->dbh->prepare( $query );
            $stmt->execute( $params );
            return $stmt->fetch();
        } catch ( PDOException $e ) {
            throw new Exception( $e->getMessage() );
        }
    }

    public function getRows ( $query, $params = array() )
    {
        try {
            $stmt = $this->dbh->prepare( $query );
            $stmt->execute( $params );
            return $stmt->fetchAll();
        } catch ( PDOException $e ) {
            throw new Exception( $e->getMessage() );
        }
    }
    public function insertRow ( $query, $params )
    {
        try {
            $stmt = $this->dbh->prepare( $query );
            $stmt->execute( $params );
        } catch ( PDOException $e ) {
            throw new Exception( $e->getMessage() );
        }
    }
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
    /*

        public function updateRow ( $query, $params )
        {
            return $this->insertRow( $query, $params );
        }

        public function deleteRow ( $query, $params )
        {
            return $this->insertRow( $query, $params );
        }*/

    /**
     * Empty clone magic method to prevent duplication.
     */
    private function __clone ()
    {
    }
} 