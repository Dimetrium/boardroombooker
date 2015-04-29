<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 text-center">
            <h1>Boardroom Booking</h1>

            <p>Details</p>
            <br>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
            <form class="form-horizontal" method="POST" id="details">

                <div class="form-group">
                    <div class="col-sm-2 col-md-2">
                        <label for="start" class="control-label">When:</label>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" class="form-control" name="start" value="<?= $app_start ?>"">
                    </div>
                    <div class="col-sm-1 col-md-1"><p>&mdash;</p></div>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" class="form-control" name="end" value="<?= $app_end ?>"">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2 col-md-2">
                        <label for="notes" class="control-label">Notes: </label>
                    </div>
                    <div class="col-sm-10 col-md-10">
                        <input type="text" class="form-control" name="notes" value="<?= $description ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2 col-md-2">
                        <label for="who" class="control-label">Who: </label>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <select class="form-control" name="employee_id">
                            <?= $users ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-offset-2 col-sm-9 col-md-offset-2 col-md-9">
                    <h5>
                        <small>Submitted: 2015-04-25 12:30:44</small>
                    </h5>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="occurrences" value="true">Apply to all occurrences?</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3 col-md-offset-2 col-md-3">
                        <button type="submit" name="update" value="<?= $appointment_id ?>" class="btn btn-default"
                                formaction="details/update">UPDATE
                        </button>
                    </div>
                    <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" name="delete" value="<?= $appointment_id ?>" class="btn btn-default"
                                formaction="details/delete">DELETE
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
