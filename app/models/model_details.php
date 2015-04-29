<?php

class Model_Details extends Model
{

  public function getEvent($id)
  {
    $query = <<<SQL
    SELECT appointment_id, employee_id, app_start, app_end, description
    FROM xyz_appointments
    WHERE appointment_id = :id;
SQL;
    $result = $this->dbh->getRow($query, array(
      'id' => $id));

    $result['app_start'] = date('H:i', $result['app_start']);
    $result['app_end'] = date('H:i', $result['app_end']);


    var_dump($result);
    $dbh = NULL;
    return $result;
  }

}
