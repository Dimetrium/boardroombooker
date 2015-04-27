<?php

/**
 * Class Model_Main
 *
 */
class Model_Employee extends Model
{
    private $month;
    private $year;

    public function getEvents ()
    {
        /**
         * get values of rooms id's from main page header of boardrooms select,
         * write in session
         * and Depending on room_ID get events
         * @default '1' boardroom.
         */
        /**
         * TODO: Change store method to Cookies
         */
        session_start();
        if ( isset( $_POST[ 'id_room' ] ) ) {
            $_SESSION[ 'id_room' ] = $_POST[ 'id_room' ];
        } else {
            if ( !isset( $_SESSION[ 'id_room' ] ) ) {
                $_SESSION[ 'id_room' ] = '1';
            }
            $id = $_SESSION[ 'id_room' ];
        }
        session_write_close();

        $query = <<<SQL
            SELECT app_start, app_end, id_room
            FROM xyz_appointments
            WHERE id_room = :id
SQL;

        $result = $this->dbh->getRows( $query, array(
            'id' => $id,
        ) );
        $dbh = NULL;
        foreach ( $result as $key => $val ) {
            if ( !empty( $val[ 'app_start' ] ) || !empty( $val[ 'app_end' ] ) ) {
                $time = date( 'H:i', $val[ 'app_start' ] ) . '-' . date( 'H:i', $val[ 'app_end' ] );
                $eventDate = date( 'm/d/Y', $val[ 'app_start' ] );
            }

            $event[ $key ] = [ $time => $eventDate ];

        }

        return $event;
    }

    public function setDateToShow ( $month = NULL, $year = NULL )
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function getDateToShow ()
    {
        if ( isset( $_POST[ 'month' ] ) && isset( $_POST[ 'year' ] ) ) {
            $month = $_POST[ 'month' ];
            $year = $_POST[ 'year' ];
        } else if ( NULL !== $this->month ) {
            $month = $this->month;
        } else if ( NULL == $this->year ) {
            $year = $this->year;
        }

        $month ? $showmonth = $month : $showmonth = date( 'm', time() );
        $year ? $showyear = $year : $showyear = date( 'Y', time() );
        $current_day = date( 'd', time() );

        return $showmonth . '/' . $current_day . '/' . $showyear;
    }

    public function getUsers ()
    {

        $query = <<<SQL
            SELECT employee_name, employee_id, employee_email
            FROM xyz_employee
SQL;

        $result = $this->dbh->getRows( $query );
        $dbh = NULL;

        return $result;

    }

    public function getUser ($employee_id)
    {

        $query = <<<SQL
            SELECT employee_name, employee_id, employee_email
            FROM xyz_employee
            WHERE employee_id = :employee_id
SQL;

        $result = $this->dbh->getRow( $query, array(
            'employee_id' => $employee_id
        ) );
        $dbh = NULL;

        return $result;

    }

    public function userEdit ( $employee_id )
    {

        $employee_email = $_POST[ 'employee_email' ];

        $query =
            <<<SQL
            UPDATE xyz_employee
            SET employee_email = :employee_email
            WHERE employee_id = :employee_id;
SQL;
        $this->dbh->insertRow( $query, array(
            'employee_id' => $employee_id,
            'employee_email' => $employee_email ) );
        $lastInsId = $this->dbh->lastInsertedId();
        $this->dbh = NULL;
        if ( NULL !== $lastInsId ) {
            return TRUE;
        }

    }

    public function userDel ( $employee_id )
    {

        $query = <<<SQL
                DELETE FROM xyz_employee
                WHERE employee_id = :employee_id;
SQL;
        $this->dbh->insertRow( $query, array( 'employee_id' => $employee_id ) );
        $lastInsId = $this->dbh->lastInsertedId();
        $this->dbh = NULL;
        if ( NULL !== $lastInsId ) {
            return TRUE;
        }

        return FALSE;

    }

    public function userAdd ()
    {

        if ( isset( $_POST[ 'login' ] ) && isset( $_POST[ 'password' ] ) ) {
            $login = $_POST[ 'login' ];
            $password = md5( md5( trim( $_POST[ 'password' ] ) ) );
            $role_id = $_POST[ 'role' ];
            $name = $_POST[ 'name' ];
            $email = $_POST[ 'email' ];
        }

        $query = <<<SQL
                INSERT INTO
                xyz_employee
                SET employee_login = :employee_login,
                employee_password = :employee_password,
                role_id = :role_id,
                employee_name = :employee_name,
                employee_email = :employee_email;
SQL;
        $this->dbh->insertRow( $query, array(
            'employee_login' => $login,
            'employee_password' => $password,
            'employee_name' => $name,
            'employee_email' => $email,
            'role_id' => $role_id ) );
        $lastInsId = $this->dbh->lastInsertedId();
        $this->dbh = NULL;
        if ( NULL !== $lastInsId ) {
            return TRUE;
        }

        return FALSE;
    }

}
