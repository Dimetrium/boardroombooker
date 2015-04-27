<?php include 'header_view.php' ?>
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <h3>{{BOARDROOM}} #<?= $_SESSION[ 'id_room' ]; ?></h3>
            <hr>
            <form role="form" method="post" name="data_select">
                <select class="form-control" id="month">
                    <?= $select_month_control ?>
                </select>
                <select class="form-control" id="year">
                    <?= $select_year_control ?>
                </select>
                <button type="submit" class="btn btn-primary btn-block"/>
                OK
                </button>
            </form>
            <ul class="nav nav-stacked">
                <li><a href="bookit"><i class="glyphicon glyphicon-flash"></i>{{BOOK_IT}}</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>{{BOARDROOMS}}</a></li>
                <ul class="list-group">
                    <?= $rooms ?>
                </ul>
            </ul>
            <hr>
        </div>
        <div class="col-sm-10">
            <ul class="pager" id="scrol">
                <li class="previous">
                    <a href="main/index/<?= $previous_month_link ?>">&larr; {{PREV_MONTH}}</a>
                </li>
                <li>
                    <a href="main"
                       style="text-decoration: none; color: #080808">
                        <?= $data[ 'getDate' ][ 'month' ] . ', ' . $data[ 'getDate' ][ 'year' ] ?>
                    </a>
                </li>
                <li class="next">
                    <a href="main/index/<?= $next_month_link ?>">{{NEXT_MONTH}} &rarr;</a>
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

<?php include 'footer_view.php'; ?>
