<?php
require_once( 'public/htm_tmplt/php-calendar/classes/calendar.php' );
$month = isset( $_GET[ 'm' ] ) ? $_GET[ 'm' ] : NULL;
$year = isset( $_GET[ 'y' ] ) ? $_GET[ 'y' ] : NULL;

$calendar = Calendar::factory( $month, $year, array('week_start' => 1, 'show_days' => array(1, 1, 1, 1, 1, 1, 0)) );

$event1 = $calendar->event()->condition( 'timestamp', strtotime( date( 'F' ) . ' 21, ' . date( 'Y' ) ) )->title( 'Event 1' )->output( '<a href="#">8:00-15:00</a>' );
$event2 = $calendar->event()->condition( 'timestamp', strtotime( date( 'F' ) . ' 23, ' . date( 'Y' ) ) )->title( 'Event 1' )->output( '<a href="#">8:00-15:00</a>' );
$event3 = $calendar->event()->condition( 'timestamp', strtotime( date( 'F' ) . ' 27, ' . date( 'Y' ) ) )->title( 'Event 2' )->output( '<a href="#">15:30-18:30</a>' );
$event4 = $calendar->event()->condition( 'timestamp', strtotime( date( 'F' ) . ' 23, ' . date( 'Y' ) ) )->title( 'Event 3' )->output( '<a href="#">15:30-18:30</a>' );
$event = $calendar->event()
    ->condition('current', TRUE)  // Event is in the current month
    ->condition('month', 4)      // On the 11th month (November)
    ->condition('day_of_week', 4) // On a Thursday
    ->condition('occurrence', 2)  // The 4th Thursday of the month
    ->title('Thanksgiving')
    ->output('Thanksgiving')
    ->add_class('holiday');

$calendar->standard( 'today' )
    ->standard( 'prev-next' )
    ->standard( 'holidays' )
    ->attach( $event )
    ->attach( $event1 )
    ->attach( $event3 )
    ->attach( $event4 )
    ->attach( $event2 );
?>
<section id="main-content">
    <link rel="stylesheet" href="public/htm_tmplt/php-calendar/css/style.css"/>
    <h2>{{MAIN_H2}}</h2>
    <hr>
    <div style="width:800px; padding:20px; margin:50px auto">
        <table class="calendar">
            <thead>
            <tr class="navigation">
                <th class="prev-month"><a href="<?php echo htmlspecialchars($calendar->prev_month_url()) ?>"><?php echo $calendar->prev_month() ?></a></th>
                <th colspan="5" class="current-month"><?php echo $calendar->month() ?></th>
                <th class="next-month"><a href="<?php echo htmlspecialchars($calendar->next_month_url()) ?>"><?php echo $calendar->next_month() ?></a></th>
            </tr>
            <tr class="weekdays">
                <?php foreach ($calendar->days() as $day): ?>
                    <th><?php echo $day ?></th>
                <?php endforeach ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($calendar->weeks() as $week): ?>
                <tr>
                    <?php foreach ($week as $day): ?>
                        <?php
                        list($number, $current, $data) = $day;

                        $classes = array();
                        $output  = '';

                        if (is_array($data))
                        {
                            $classes = $data['classes'];
                            $title   = $data['title'];
                            $output  = empty($data['output']) ? '' : '<ul class="output"><li>'.implode('</li><li>', $data['output']).'</li></ul>';
                        }
                        ?>
                        <td class="day <?php echo implode(' ', $classes) ?>">
                            <span class="date" title="<?php echo implode(' / ', $title) ?>"><?php echo $number ?></span>
                            <div class="day-content">
                                <?php echo $output ?>
                            </div>
                        </td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>

</section>
<hr>
