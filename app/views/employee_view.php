<?php include 'header_view.php' ?>

<section class="section">
    <div class="container-fluid fill">

        <div class="text-center col-md-4 col-md-offset-4" data-toggle="collapse" data-target="#add">
            <button class="btn btn-default">
                <b>{{ADD_NEW_EMPLOYEE}}</b>
            </button>
        </div>

        <!--        // Add Employee Form START-->
        <div id="add" class="col-md-6 col-md-offset-3 collapse">
            <form class="form-horizontal" action='employee/add' method="POST">
                <fieldset>
                    <div id="legend" style="text-align: center">
                        <legend class=""><h2>{{REG_NEW_EMPLOYEE}}</h2></legend>
                    </div>
                    <div class="control-group col-md-offset-4 col-md-4">
                        <!-- Username -->
                        <label class="control-label" for="username">{{NAME}}</label>

                        <div class="controls">
                            <input type="text" id="name" name="name" placeholder="" class="form-control">

                            <!-- <p class="help-block">Username can contain any letters or numbers, without spaces</p>-->
                        </div>
                    </div>

                    <div class="control-group col-md-offset-4 col-md-4">
                        <!-- Username -->
                        <label class="control-label" for="login">{{LOGIN}}</label>

                        <div class="controls">
                            <input type="text" id="login" name="login" placeholder="" class="form-control">

                            <!--<p class="help-block">Username can contain any letters or numbers, without spaces</p>-->
                        </div>
                    </div>

                    <div class="control-group col-md-offset-4 col-md-4">
                        <!-- E-mail -->
                        <label class="control-label" for="email">E-mail</label>

                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="" class="form-control">

                            <!--  <p class="help-block">Please provide your E-mail</p>-->
                        </div>
                    </div>

                    <div class="control-group col-md-offset-4 col-md-4">
                        <!-- Password-->
                        <label class="control-label" for="password">{{Password}}</label>

                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder=""
                                   class="form-control">

                            <!-- <p class="help-block">Password should be at least 4 characters</p>-->
                        </div>
                    </div>

                    <div class="control-group col-md-offset-4 col-md-4">
                        <!-- Password -->
                        <label class="control-label" for="role">{{Role}}</label>

                        <div class="controls">
                            <input type="text" id="role" name="role" placeholder=""
                                   class="form-control">

                            <!-- <p class="help-block">Please confirm password</p>-->
                        </div>
                    </div>

                    <div class="control-group col-md-offset-5 col-md-4" style="margin-top: 20px">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success">{{Register}}</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <hr/>
        </div>
        <!--        // Add Employee Form END-->

        <div class="row">
            <div class="main col-md-4 col-md-offset-4">


                <h1 class="page-header">{{EMPLOYEE_LIST}}</h1>

                <div class="table-responsive">
                    <table class="table table-striped" style="border-collapse:collapse;">
                        <thead>
                        <tr>
                            <th>{{NAME}}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?= $userTable ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

    </div>
</section>


