<?php

error_reporting(E_ALL ^ E_WARNING);
require_once('public/htm_tmplt/PHPCALENDAR/SimpleCalendar-master/lib/donatj/SimpleCalendar.php');

$prevDate = strtotime('last month', '2015/04/01');
$nextDate = strtotime('next month', $date);
var_dump($prevdate);
$calendar = new SimpleCalendar();
$calendar->setDate('01-04-2015');
$calendar->setStartOfWeek('Monday');
$calendar->addDailyHtml( '8:00-10:00', '11-04-2015' );
$calendar->addDailyHtml( '11:00-12:00', '11-04-2015' );
$calendar->addDailyHtml( '11:00-12:00', '01-04-2015' );
$calendar->addDailyHtml( '11:00-12:00', '14-04-2015' );
?>
<section id="main-content">
  <link rel="stylesheet" href="public/htm_tmplt/PHPCALENDAR/SimpleCalendar-master/lib/css/SimpleCalendar.css" />
    <h2>{{MAIN_H2}}</h2>
<div><a href="#">Select Boardroom LIST</a></div>
<div>Current Boardroom</div>
    <hr>
<div><a href="#">Prev Mon</a>
<h4>Current Mon-Year</h4>
<a href="#">Next Mon</a>
</div>
<?php
$calendar->show(true);
?>
<a href="#">Book It!</a>
<a href="#">Employee List</a>
</section>
<hr>
