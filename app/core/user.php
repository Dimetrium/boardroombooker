<?php

/**
 * Class User
 */
class User
{
    private $login = '';
    private $password = '';
    private $role_id = '0';
    private $dbh = '';
    public $error = array();

    /**
     * Constructor
     */
    public function __construct ()
    {
        $this->dbh = DBConnect::getInstance();
        if ( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'password' ] ) ) {
            $this->login = $_POST[ 'username' ];
            $this->password = $_POST[ 'password' ];
            $this->role_id = $_POST[ 'role_id' ];
        }
    }

// Registration part
    /**
     * @return bool
     */
    private function checkLoginEmpty ()
    {
        if ( !preg_match( "/^[a-zA-Z0-9]+$/", $this->login ) ) {
            $this->error[ ] = "Username can only consist of letters of the alphabet and numbers";

            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * @return bool
     */
    private function checkLoginLength ()
    {
        if ( strlen( $this->login ) < 3 or strlen( $_POST[ 'employee_name' ] ) > 30 ) {
            $this->error[ ] = "Username must be at least 3 characters and no more than 30";

            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * @return bool
     * @throws Exception
     */
    private function checkUserExistName ()
    {
        $query = <<<SQL
            SELECT COUNT
            (employee_id)
            FROM xyz_employee
            WHERE employee_name = :employee_name;
SQL;
        $data = $this->dbh->getRows( $query, array( 'employee_name' => $this->login ) );
        $this->dbh = NULL;
        if ( $data > 0 ) {
            $this->error[ ] = "Members with such password already exist in the database";

            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * If check's ok - add user to DB
     *
     * @param $role
     *
     * @return string last Insert Id
     * @throws Exception
     */
    public function userAdd ( $role )
    {
        if ( !FALSE == (
                $this->checkLoginEmpty() ||
                $this->checkLoginLength() ||
                $this->checkUserExistName() )
        ) {
            $this->role_id = $role;

            $this->password = md5( md5( trim( $this->password ) ) );
            $query = <<<SQL
                INSERT INTO
                xyz_employee
                SET employee_name = :employee_name, employee_password = :employee_password, role_id = :role_id;
SQL;
            $this->dbh->insertRow( $query, array(
                'employee_name' => $this->login,
                'employee_password' => $this->password,
                'role_id' => $this->role_id ) );
            $this->dbh = NULL;

            return $this->dbh->lastInsertId();
        } else {
            return $this->error[ ] = "When registering the following errors occurred:";
        }
    }
// Authorization part
    /**
     * @return bool
     * @throws Exception
     */
    public function userAuthorization ()
    {
        // Get record  from a DB at which login equals to the entered
        $query = <<<SQL
            SELECT
            employee_id, employee_password, employee_name
            FROM xyz_employee
            WHERE employee_name = :employee_name LIMIT 1;
SQL;
        $data = $this->dbh->getRow( $query, array( 'employee_name' => $this->login ) );
        //  Is password compare ...
        if ( $data[ 'employee_password' ] === $this->password ) {
            // ...generate a random hash,
            $hash = md5( uniqid( rand(), TRUE ) );
            // and write down a new hash of authorization in a DB
            $query = <<<SQL
                UPDATE xyz_employee
                SET employee_hash= :employee_hash
                WHERE employee_id= :employee_id;
SQL;
            $this->dbh->updateRow( $query, array(
                'employee_id' => $data[ 'employee_id' ],
                'employee_hash' => $hash ) );
            $this->dbh = NULL;
            // Set cookies
            setcookie( "id", $data[ 'employee_id' ], time() + 60 * 60 * 24 * 30, BASE );
            setcookie( "hash", $hash, time() + 60 * 60 * 24 * 30 );
            setcookie( "name", $data[ 'employee_name' ], time() + 60 * 60 * 24 * 30, BASE );

            return TRUE;
        } else {
            $this->error[ ] = "You have entered incorrect login or password";

            return FALSE;
        }
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function userCookie ()
    {
        if ( isset( $_COOKIE[ 'id' ] ) and isset( $_COOKIE[ 'hash' ] ) ) {
            $query = <<<SQL
                SELECT employee_hash, employee_id, employee_name
                FROM xyz_employee
                WHERE employee_id = :employee_id
                LIMIT 1;
SQL;
            $data = $this->dbh->getRow( $query, array( 'employee_id' => intval( $_COOKIE[ 'id' ] ) ) );
            $this->dbh = NULL;
            if ( ( $data[ 'employee_hash' ] !== $_COOKIE[ 'hash' ] )
                or ( $data[ 'employee_id' ] !== $_COOKIE[ 'id' ] )
            ) {
                setcookie( "id", "", time() - 3600 * 24 * 30 * 12, BASE );
                setcookie( "hash", "", time() - 3600 * 24 * 30 * 12, BASE );

                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }

    }

    public function userLogout ()
    {
        if ( isset( $_COOKIE[ 'id' ] ) and isset( $_COOKIE[ 'hash' ] ) AND isset( $_COOKIE[ 'name' ] ) ) {
            unset($_COOKIE['id']);
            unset($_COOKIE['hash']);
            unset($_COOKIE['name']);
            setcookie( "id", null, time() - 3600 * 24 * 30 * 12, BASE );
            setcookie( "hash", null, time() - 3600 * 24 * 30 * 12, BASE );
            setcookie( "name", null, time() - 3600 * 24 * 30 * 12, BASE );
        } else {
            return false;
        }

    }
    



}
