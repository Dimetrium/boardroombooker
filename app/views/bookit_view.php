<?php include 'header_view.php'?>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-4">
            <form method="post" action="bookit/add">
                <fieldset>
                    <!-- Form Name -->
                    <legend style="text-align: center">{{MAIN_H2}}</legend>

                    <!-- 1 -->
                    <div class="control-group">
                        <label class="control-label">{{Booked_for}}</label>

                        <div class="controls">
                            <select id="selectbasic" name="employee_id" class="form-control">
                                <?= $userList; ?>
                            </select>
                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="control-group">
                        <label class="control-label" for="dateRangePicker">{{Booked_date}}</label>

                        <div class="controls">
                            <div class="input-group input-append date" id="dateRangePicker">
                                <input type="text" class="form-control" name="date" readonly/>
                                <span class="input-group-addon add-on">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>


                    <!-- 3 -->
                    <div class="control-group">
                        <label class="control-label" for="selectbasic">
                            {{Booked_time}}
                        </label>

                        <div class="controls">
                            <div class="input-group">

                                <select id="selectbasic" name="start" class="form-control">
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                </select>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                                <select id="selectbasic" name="end" class="form-control">
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                </select>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- 4 -->
                    <div class="control-group">
                        <label class="control-label" for="textarea">{{Booked_specifics}}</label>

                        <div class="controls">
                            <textarea id="textarea" name="description" class="form-control"></textarea>
                        </div>
                    </div>

                    <!-- 5 -->
                    <div class="control-group">
                        <label class="control-label" for="isRecurring">{{IS_Recurring}}</label>

                        <div class="controls">
                            <label class="radio" for="isRecurring">
                                <input type="radio" name="isRecurring" value="false" checked="checked"
                                       data-toggle="collapse" data-target=".recurring">
                                {{NO}}
                            </label>
                            <label class="radio" for="isRecurring">
                                <input type="radio" name="isRecurring" value="true" data-toggle="collapse"
                                       data-target=".recurring">
                                {{YES}}
                            </label>
                        </div>
                    </div>

                    <!-- 6 -->
                    <div class="control-group recurring collapse">
                        <label class="control-label" for="specRecurring">{{specRecurring}}</label>

                        <div class="controls">
                            <label class="radio" for="specRecurring-1">
                                <input type="radio" name="specRecurring" value="1">
                                {{Weekly}}
                            </label>
                            <label class="radio" for="specRecurring">
                                <input type="radio" name="specRecurring" value="2">
                                {{Bi-weekly}}
                            </label>
                            <label class="radio" for="specRecurring">
                                <input type="radio" name="specRecurring" value="3">
                                {{Monthly}}
                            </label>
                        </div>
                    </div>
                    <!-- 7 -->
                    <div class="control-group recurring collapse">
                        <label class="control-label" for="radios">
                            {{Recurring_info}}
                        </label>

                        <div class="controls">
                            <input type="text" class="form-control" name=""/>{{Duration}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success" name="createEvent" value="Submit"><span
                                    class="glyphicon glyphicon-check"></span>{{BOOK_IT}}
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

