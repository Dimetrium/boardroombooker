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
    $rooms .= '<li class="list-group-item"><a href="main" onClick="DoPost(' . $room . ')">Boardroom # ' . $room . '</a></li>';
}

?>
<script>
    jQuery(document).ready(function () {
        $("html, body").animate({scrollTop: $("#scrol").offset().top}, 700);
        console.log('executed scrollToElement');
        return true;
    });
</script>
<style>
    .navbar-static-top {
        margin-bottom: 20px;
    }

    i {
        font-size: 18px;
    }

    footer {
        margin-top: 20px;
        padding-top: 20px;
        padding-bottom: 20px;
        background-color: #efefef;
    }

    .nav > li .count {
        position: absolute;
        top: 10%;
        right: 25%;
        font-size: 10px;
        font-weight: normal;
        background: rgba(41, 200, 41, 0.75);
        color: rgb(255, 255, 255);
        line-height: 1em;
        padding: 2px 4px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        border-radius: 10px;
    }

</style>
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-toggle"></span>
            </button>
            <a class="navbar-brand" href="#">{{MAIN_H2}}</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
                        <i class="glyphicon glyphicon-user"></i> Root <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="#">My Profile</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <h3> Boardroom #<?= $_SESSION[ 'id_room' ]; ?></h3>
            <hr>
            <form role="form" method="post" >
                <select class="form-control" id="month">
                    <?= $select_month_control ?>
                </select>
                <select class="form-control" id="year">
                    <?= $select_year_control ?>
                </select>
                <input type="submit" class="btn btn-primary btn-block"/>
            </form>
            <ul class="nav nav-stacked">
                <li><a href="bookit"><i class="glyphicon glyphicon-flash"></i> Book It!</a></li>
                <li><a href="javascript:;"><i class="glyphicon glyphicon-link"></i> Employee List</a></li>
                <li><a href="javascript:;"><i class="glyphicon glyphicon-list-alt"></i> Boardrooms</a></li>
                <ul class="list-group">
                    <?= $rooms ?>
                </ul>
            </ul>
            <hr>
        </div>
        <div class="col-sm-10">
            <ul class="pager" id="scrol">
                <li class="previous">
                    <a href="main/index/<?= $previous_month_link ?>">&larr; Prev</a>
                </li>
                <li>
                    <a href="main"
                       style="text-decoration: none; color: #080808">
                        <?= $data[ 'getDate' ][ 'month' ] . ', ' . $data[ 'getDate' ][ 'year' ] ?>
                    </a>
                </li>
                <li class="next">
                    <a href="main/index/<?= $next_month_link ?>">Next &rarr;</a>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <?= $data[ 'showCalendar' ]; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center">This dashboard layout
    <a href="<?= BASE ?>"><strong>Boardroom Booking</strong></a>
</footer>

<script language="javascript">
    function DoPost(id) {
        $.post("main", {id_room: id});  //Your values here..
    }
</script>

