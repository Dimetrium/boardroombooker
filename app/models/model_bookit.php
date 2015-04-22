<?php

class Model_Bookit extends Model
{

    public function addEvent ()
    {

      
      $start_date = $_POST['date'].' '.$_POST['start'].':00';
      $end_date = $_POST['date'].' '.$_POST['end'].':00';

      $start = strtotime($start_date);
      $end = strtotime($end_date);
      session_start();
      $room_id = $_SESSION['id_room'];
      session_write_close();
      $query = <<<SQL
            INSERT INTO xyz_appointments (app_start, app_end, id_room)
            VALUES (:start, :end, :room_id); 
SQL;
      $this->dbh->insertRow($query, array(
        'start'=>$start,
        'end' => $end,
        'room_id' => $room_id
        )
      );

      header('Location:'.BASE);
    }

    public function del ( $month, $year )
    {
    }

}
