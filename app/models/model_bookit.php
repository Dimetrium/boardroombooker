<?php

class Model_Bookit extends Model
{

    public function addEvent ()
    {

        $date = $_POST[ 'date' ];
        $employee_id = $_POST[ 'employee_id' ];
        $description = $_POST[ 'description' ];
        $duration = $_POST[ 'duration' ];
        session_start();
        $room_id = $_SESSION[ 'id_room' ];
        session_write_close();

        $start_date = $_POST[ 'date' ] . ' ' . $_POST[ 'start' ] . ':00';
        $end_date = $_POST[ 'date' ] . ' ' . $_POST[ 'end' ] . ':00';
        $start = strtotime( $start_date );
        $end = strtotime( $end_date );

        $query = <<<SQL
            INSERT INTO xyz_appointments (employee_id, app_start, app_end, id_room, description, recursion)
            VALUES (:employee_id, :start, :end, :room_id, :description, :recursion);
SQL;
        $this->dbh->insertRow( $query, array(
                'employee_id' => $employee_id,
                'start' => $start,
                'end' => $end,
                'room_id' => $room_id,
                'description' => $description,
                'recursion' => $employee_id
            )
        );

        $lastInsId = $this->dbh->lastInsertedId();

        $query = <<<SQL
            UPDATE xyz_appointments
            SET recursion = :recursion
            WHERE appointment_id = :recursion;
SQL;
        $this->dbh->insertRow( $query, array(
            'recursion' => $lastInsId ) );


        // Recurring engine
        if ( 'true' == $_POST[ 'isRecurring' ] ) {
            switch ( $_POST[ 'specRecurring' ] ) {
                case "Weekly":
                    for ( $i = 0; $i < $duration; $i++ ) {
                        $date = date( 'm/d/Y', strtotime( "+7 day" . $date ) );
                        $start_date = $date . ' ' . $_POST[ 'start' ] . ':00';
                        $end_date = $date . ' ' . $_POST[ 'end' ] . ':00';
                        $start = strtotime( $start_date );
                        $end = strtotime( $end_date );
                        $query = <<<SQL
            INSERT INTO xyz_appointments (employee_id, app_start, app_end, id_room, description, recursion)
            VALUES (:employee_id, :start, :end, :room_id, :description, :recursion);
SQL;
                        $this->dbh->insertRow( $query, array(
                                'employee_id' => $employee_id,
                                'start' => $start,
                                'end' => $end,
                                'room_id' => $room_id,
                                'description' => $description,
                                'recursion' => $lastInsId
                            )
                        );
                    }
                    break;
                case "Bi-weekly":
                    for ( $i = 0; $i < 2; $i++ ) {

                        $date = date( 'm/d/Y', strtotime( "+14 day" . $date ) );
                        $start_date = $date . ' ' . $_POST[ 'start' ] . ':00';
                        $end_date = $date . ' ' . $_POST[ 'end' ] . ':00';
                        $start = strtotime( $start_date );
                        $end = strtotime( $end_date );
                        $query = <<<SQL
            INSERT INTO xyz_appointments (employee_id, app_start, app_end, id_room, description, recursion)
            VALUES (:employee_id, :start, :end, :room_id, :description, :recursion);
SQL;
                        $this->dbh->insertRow( $query, array(
                                'employee_id' => $employee_id,
                                'start' => $start,
                                'end' => $end,
                                'room_id' => $room_id,
                                'description' => $description,
                                'recursion' => $lastInsId
                            )
                        );
                    }
                    break;
                case "Monthly":
                    for ( $i = 0; $i < 1; $i++ ) {

                        $date = date( 'm/d/Y', strtotime( "+28 day" . $date ) );
                        $start_date = $date . ' ' . $_POST[ 'start' ] . ':00';
                        $end_date = $date . ' ' . $_POST[ 'end' ] . ':00';
                        $start = strtotime( $start_date );
                        $end = strtotime( $end_date );
                        $query = <<<SQL
            INSERT INTO xyz_appointments (employee_id, app_start, app_end, id_room, description, recursion)
            VALUES (:employee_id, :start, :end, :room_id, :description, :recursion);
SQL;
                        $this->dbh->insertRow( $query, array(
                                'employee_id' => $employee_id,
                                'start' => $start,
                                'end' => $end,
                                'room_id' => $room_id,
                                'description' => $description,
                                'recursion' => $lastInsId
                            )
                        );
                    }
                    break;

            }
        }

        $this->dbh = null;

        header( 'Location:' . BASE );

    }

    public function getUsers ()
    {

        $query = <<<SQL
            SELECT employee_name, employee_id
            FROM xyz_employee;
SQL;
        $data = $this->dbh->getRows( $query );
        $this->dbh = null;

        return $data;

    }

}
