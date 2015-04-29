<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1>Boardroom Booking</h1>
            <p>Details</p>
            <br>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4">
            <form class="form-horizontal" role="form">

                <div class="form-group">
                    <div class="col-md-2">
                        <label for="start" class="control-label">When:</label>
                    </div>
                    <div class="col-md-4">
                    <input type="text" class="form-control" name="start" placeholder="<?=$app_start?>">
                    </div>
                    <div class="col-md-1"><p>&mdash;</p></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="end" placeholder="<?=$app_end?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2">
                        <label for="notes" class="control-label">Notes</label>
                    </div>
                    <div class="col-md-10">
                    <input type="text" class="form-control" name="notes" placeholder="<?=$description?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2">
                        <label for="who" class="control-label">Who:</label>
                    </div>
                    <div class="dropdown col-md-10">
                        <button class="btn btn-default dropdown-toggle" type="button" name="who" data-toggle="dropdown">
                            John Smith
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="who">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ali Gee</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Jan Toe</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Vicus Tone</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <h5>
                        <small>Submitted: 2015-04-25 12:30:44</small>
                    </h5>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Apply to all occurrences?</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3 col-md-offset-2 col-md-3">
                        <button type="submit" class="btn btn-default">UPDATE</button>
                    </div>
                    <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" class="btn btn-default">DELETE</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
