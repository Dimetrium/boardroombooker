<?php

class Model_Bookit extends Model
{

  public function addEvent ()
  {
    if ( 'true' == $_POST[ 'isRecurring' ] ) {
      switch ( $_POST[ 'specRecurring' ] ) {
      case "Weekly":
        var_dump('Weekly recurring event added : '. $_POST['duration'].' '.$_POST['date']);
        
        break;
      case "Bi-weekly":
        break;
      case "Monthly":
        break;

      }
      exit;
    }

    $start_date = $_POST[ 'date' ] . ' ' . $_POST[ 'start' ] . ':00';
    $end_date = $_POST[ 'date' ] . ' ' . $_POST[ 'end' ] . ':00';
    $employee_id = $_POST[ 'employee_id' ];
    $description = $_POST[ 'description' ];

    $start = strtotime( $start_date );
    $end = strtotime( $end_date );

    session_start();
    $room_id = $_SESSION[ 'id_room' ];
    session_write_close();

    $query = <<<SQL
            INSERT INTO xyz_appointments (employee_id, app_start, app_end, id_room, description)
            VALUES (:employee_id, :start, :end, :room_id, :description);
SQL;
    $this->dbh->insertRow( $query, array(
      'employee_id' => $employee_id,
      'start' => $start,
      'end' => $end,
      'room_id' => $room_id,
      'description' => $description
    )
  );

    header( 'Location:' . BASE );
  }

  public function delEvent ( $month, $year )
  {
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
