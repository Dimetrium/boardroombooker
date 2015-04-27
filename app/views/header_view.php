<div id="top-nav" class="navbar navbar-inverse navbar-static-top" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-toggle"></span>
            </button>
            <a class="navbar-brand" href="#">{{MAIN_H2}}</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <button type="submit" name="lang" method="post" value="ru">Ru</a>
                <button type="submit" name="lang" method="post" value="en">En</a>
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
                        <i class="glyphicon glyphicon-user"></i> <?= $_COOKIE[ 'name' ] ?> <span
                            class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="employee"><i class="glyphicon glyphicon-link"></i>{{EMPLOYEE_LIST}}</a></li>
                        <li><a href="main/logout"><i class="glyphicon glyphicon-lock"></i>{{LOGOUT}}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
