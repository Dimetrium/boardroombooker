<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div><h1>Boardroom Booker</h1></div>
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Sign In</h1>
                </div>
                <div class="panel-body">
                    <form method="post" action='' name="login_form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="{{Username}}" name="login" type="login"
                                       autofocus="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="{{Password}}" name="password" type="password"
                                       value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success">{{Login}}</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
