<?php
$month = $data[ 'getDate' ][ 'mon' ];
$year = $data[ 'getDate' ][ 'year' ];
$boardrooms = $data[ 'boardrooms' ];


/* select month control */
for ( $x = 1; $x <= 12; $x++ ) {
    $select_month_control .= '<option value="' . $x . '"' . ( $x != $month ? '' : ' selected="selected"' ) . '>' . date( 'F', mktime( 0, 0, 0, $x, 1, $data[ 'getDate' ][ 'year' ] ) ) . '</option>';
}

/* select year control */
$year_range = 7;
for ( $x = ( $data[ 'getDate' ][ 'year' ] - floor( $year_range / 2 ) ); $x <= ( $data[ 'getDate' ][ 'year' ] + floor( $year_range / 2 ) ); $x++ ) {
    $select_year_control .= '<option value="' . $x . '"' . ( $x != $data[ 'getDate' ][ 'year' ] ? '' : ' selected="selected"' ) . '>' . $x . '</option>';
}

/* "next month" control */
$next_month_link = ( $month != 12 ? $month + 1 : 1 ) . '/' . ( $month != 12 ? $year : $year + 1 );

/* "previous month" control */
$previous_month_link = ( $month != 1 ? $month - 1 : 12 ) . '/' . ( $month != 1 ? $year : $year - 1 );

/* booardroom list */
foreach ( $boardrooms as $room ) {
    $rooms .= '<div><a href="main" onClick="DoPost(' . $room . ')")>Boardroom # ' . $room . '</a></div>';
//   $rooms .= '<div><a href="boardroom/'.$room.'" method="post">Boardroom # '.$room.'</a></div>';
//    <a href="javascript:DoPost()">Click Here</A>;
}

?>
<script language="javascript">

    function DoPost(id) {
        $.post("main", {id_room: id});  //Your values here..
    }

</script>

<div style="text-align: center">
    <?= $rooms ?>
</div>
<h2>{{MAIN_H2}}</h2>
<div>Boardroom # <?= $_SESSION[ 'id_room' ]; ?></div>
<hr>
<div class="title_bar">
    <div class="selectDate">
        <form method="post">
            <select name="month" id="month">
                <?= $select_month_control ?>
            </select>
            <select name="year" id="year">
                <?= $select_year_control ?>
            </select>

            <input type="submit"
                   name="submit"
                   value="Go"/>
        </form>
    </div>

    <div class="previous_month">
        <a href="main/index/<?= $previous_month_link ?>" class="control"><<< Previous Month</a>
    </div>
    <div class="show_month">
        <h4><a href="main"><?= $data[ 'getDate' ][ 'month' ] . ', ' . $data[ 'getDate' ][ 'year' ] ?></a></h4>
    </div>
    <div class="next_month">
        <a href="main/index/<?= $next_month_link ?>" class="control">Next Month >>></a>
    </div>
</div>
<hr/>
<?= $data[ 'showCalendar' ]; ?>
<a href="bookit">Book It!</a>
<a href="#">Employee List</a>
<hr>
