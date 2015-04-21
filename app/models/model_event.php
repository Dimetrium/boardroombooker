<?php

/**
 * Class Event
 *
 */
class Model_Event extends Model
{

    /**
     * @return array
     */
    public function add ()
    {

        $calendar = new Calendar($showmonth . '/'.$current_day.'/' . $showyear);

    }

    /**
     * @return array
     */
    /* draws a calendar */
    public function del ( $month, $year )
    {

    }

}