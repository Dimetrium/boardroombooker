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
                        <i class="glyphicon glyphicon-user"></i> <?=$data[ 'user' ]?> <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="#">My Profile</a></li>
                        <li><a href="main/logout"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
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
            <form role="form" method="post" name="data_select" >
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
                <li><a href="#"><i class="glyphicon glyphicon-link"></i> Employee List</a></li>
                <li><a href="j#"><i class="glyphicon glyphicon-list-alt"></i> Boardrooms</a></li>
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
