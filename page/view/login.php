<div class="container login-container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h2 class="login-header">혜정트래블러</h2>
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="/page/model/login_ok.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="ID" name="id" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="login-panel panel panel-default login-sub-panel">
                <p>처음이신가요? <a href="/page/view/join.php">데일리투어 가입하기</a></p>
            </div>
        </div>
    </div>
</div>
