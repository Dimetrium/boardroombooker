<style>
    html, body {
        height: 100%;
    }

    .section {
        width: 100%;
        height: 100%;
        min-height: 100%;
        display: block;
    }

    .fill {
        min-height: 100%;
        height: 100%;
    }
</style>
<section class="section" style="
    background-image: url(http://boardroombooker/public/img/woood.jpg);">
    <div class="container fill">
        <div class="row">
            <div class="col-md-12 text-center" style="margin-top: 100px;">
                <h1>{{EDIT_EMAIL}}</h1>

                <p>{{OF_EMPLOYEE}} <?= $data[ 'employee_name' ] ?>.</p>

                <form class="form-horizontal col-md-12" id="form1" method="POST">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            <input type="email" class="form-control" name="employee_email"
                                   placeholder="<?= $data[ 'employee_email' ] ?>">
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="col-md-offset-4 col-md-4">
                        <button type="submit" form="form1" class="btn btn-lg btn-primary">{{UPD_BTN}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
