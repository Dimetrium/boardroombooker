<style type="text/css">
    /**
     * Override feedback icon position
     * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
     */
    #dateRangeForm .form-control-feedback {
        top: 0;
        right: -15px;
    }
</style>
<div class="container">
<div class="row">
    <div class="col-md-4">
        <form method="post" action="bookit/add">
        <fieldset>
    <!-- Form Name -->
    <legend>Boardroom Booker</legend>

    <!-- 1 -->
    <div class="control-group">
        <label class="control-label">1. Booked for:</label>

        <div class="controls">
            <select id="selectbasic" name="employee_id" class="input-xlarge">
                <option value="<?= data['employee_id']?>"> <?= data['employee_name'] ?> </option>
            </select>
        </div>
    </div>

    <!-- 2 -->
    <div class="control-group">
        <label class="control-label" for="dateRangePicker">2. I would like to book this meeting:</label>

        <div class="controls">
            <div class="input-group input-append date" id="dateRangePicker">
                <input type="text" class="form-control" name="date"/>
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>


    <!-- 3 -->
    <div class="control-group">
        <label class="control-label" for="selectbasic">
            3. Specify what the time and end of the meeting.
        </label>

        <div class="controls">
            <div class="input-group clockpicker">
                <input type="text" class="form-control" name="start" value="09:30">
                <input type="text" class="form-control" name="end" value="18:30">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
    </div>

    <!-- 4 -->
    <div class="control-group">
        <label class="control-label" for="textarea">4. Enter the specifics for the meeting.</label>

        <div class="controls">
            <textarea id="textarea" name="textarea"></textarea>
        </div>
    </div>

    <!-- 5 -->
    <div class="control-group">
        <label class="control-label" for="isRecurring">5. Is this going to be a recurring event?</label>

        <div class="controls">
            <label class="radio" for="isRecurring">
                <input type="radio" name="isRecurring" value="false" checked="checked">
                No
            </label>
            <label class="radio" for="isRecurring">
                <input type="radio" name="isRecurring" value="true">
                Yes
            </label>
        </div>
    </div>

    <!-- 6 -->
    <div class="control-group">
        <label class="control-label" for="specRecurring">6. If it is recurring, specify weekly, bi-weekly, or
            monthly.</label>

        <div class="controls">
            <label class="radio" for="specRecurring-1">
                <input type="radio" name="specRecurring" value="1">
                Weekly
            </label>
            <label class="radio" for="specRecurring">
                <input type="radio" name="specRecurring" value="2">
                Bi-weekly
            </label>
            <label class="radio" for="specRecurring">
                <input type="radio" name="specRecurring" value="3">
                Monthly
            </label>
        </div>
    </div>
    <!-- 7 -->
    <div class="control-group">
        <label class="control-label" for="radios">
            If weekly or bi-weekly, specify the number of weeks for it to keep recurring.
            If monthly, specify the number of months.
            (If you choose "be-weekly" and put in an odd number of week, the computer will round down.)
        </label>

        <div class="controls">
            <input type="text" class="form-control" name=""/> Duration (max 4 weeks)
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-success" name="createEvent" value="Submit"><span class="glyphicon glyphicon-check"></span>Book It!
            </button>
        </div>
    </div>
        </fieldset>
</form></div></div>
</div>

