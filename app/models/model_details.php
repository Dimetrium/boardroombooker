<?php

class Model_Details extends Model
{

    public function getEvent ( $id )
    {

        $query = <<<SQL
    SELECT appointment_id, employee_id, app_start, app_end, description, submitted, recursion
    FROM xyz_appointments
    WHERE appointment_id = :id;
SQL;
        $result = $this->dbh->getRow( $query, array(
            'id' => $id ) );

        $query = <<<SQL
            SELECT employee_name, employee_id, employee_email
            FROM xyz_employee
SQL;

        $result[ 'users' ] = $this->dbh->getRows( $query );
        $dbh = null;

        $result[ 'app_data' ] = date( 'm/d/Y', $result[ 'app_start' ] );
        $result[ 'app_start' ] = date( 'H:i', $result[ 'app_start' ] );
        $result[ 'app_end' ] = date( 'H:i', $result[ 'app_end' ] );

        return $result;

    }

    public function delEvent ()
    {

        if ( isset( $_POST[ 'occurrences' ] ) ) {

            $query = <<<SQL
                DELETE FROM xyz_appointments
                 WHERE recursion = :recursion;
SQL;
            $this->dbh->insertRow( $query, array( 'recursion' => $_POST[ 'occurrences' ] ) );

        }
        $query = <<<SQL
                DELETE FROM xyz_appointments
                WHERE appointment_id = :appointment_id;
SQL;
        $this->dbh->insertRow( $query, array( 'appointment_id' => $_POST[ 'delete' ] ) );
        $lastInsId = $this->dbh->lastInsertedId();
        $this->dbh = null;

        if ( null !== $lastInsId ) {

            return true;
        }

        return false;
    }

    public function updateEvent ()
    {

        $appointment_id = $_POST[ 'update' ];
        $app_start = strtotime( $_POST[ 'date' ] . $_POST[ 'start' ] );
        $app_end = strtotime( $_POST[ 'date' ] . $_POST[ 'end' ] );

        $description = $_POST[ 'notes' ];
        $employee_id = $_POST[ 'employee_id' ];

        if ( isset( $_POST[ 'occurrences' ] ) ) {
            $query = <<<SQL
                UPDATE xyz_appointments
            SET app_start = UNIX_TIMESTAMP(ADDTIME(TIMESTAMP(date(FROM_UNIXTIME(app_start))), CONCAT('0 ',:app_start,':0'))),
                app_end = UNIX_TIMESTAMP(ADDTIME(TIMESTAMP(date(FROM_UNIXTIME(app_end))), CONCAT('0 ',:app_end,':0'))),
                description = :description,
                employee_id = :employee_id
            WHERE recursion = :recursion;
SQL;
            $this->dbh->insertRow( $query, array(
                'recursion' => $_POST[ 'occurrences' ],
                'app_start' => $_POST[ 'start' ],
                'app_end' => $_POST[ 'end' ],
                'description' => $description,
                'employee_id' => $employee_id ) );
        }

        $query = <<<SQL
            UPDATE xyz_appointments
            SET app_start = :app_start ,
                app_end = :app_end,
                description = :description,
                employee_id = :employee_id
            WHERE appointment_id = :appointment_id;
SQL;
        $this->dbh->insertRow( $query, array(
            'appointment_id' => $appointment_id,
            'app_start' => $app_start,
            'app_end' => $app_end,
            'description' => $description,
            'employee_id' => $employee_id ) );
        $lastInsId = $this->dbh->lastInsertedId();
        $this->dbh = null;
        if ( null !== $lastInsId ) {
            return true;
        }
    }

}
