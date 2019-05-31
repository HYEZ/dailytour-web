<?php include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php"; ?>
<?php if(isset($_SESSION['user_id'])) { move("/");} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DailyTour</title>
    
    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="/css/agency.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/jquery/jquery-ui-1.11.4/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/assets/jquery/jquery-ui-1.11.4/jquery-ui.theme.css">
    <link rel="stylesheet" type="text/css" href="/assets/jquery/jquery-ui-1.11.4/jquery-ui.structure.css">
    <link href="/assets/css/default.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

</head>
<body>
	<div class="container login-container">
	    <div class="row">
	        <div class="col-md-4 col-md-offset-4" style="margin-top: -100px;">
	            <h2 class="login-header">혜정트래블러</h2>
	            <div class="login-panel panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title">JOIN</h3>
	                </div>
	                <div class="panel-body">
	                    <form role="form" action="/page/model/join_ok.php" method="post">
	                        <fieldset>
	                            <div class="form-group">
	                                <input class="form-control" placeholder="ID" name="id" type="text" autofocus>
	                            </div>
	                            <div class="form-group">
	                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
	                            </div>
	                            <div class="form-group">
	                                <input class="form-control" placeholder="Name" name="name" type="text" value="">
	                            </div>
	                            <div class="form-group">
	                                <input class="form-control" placeholder="Nickname" name="nickname" type="text" autofocus>
	                            </div>
	                            <div class="form-group">
	                                <input class="form-control" placeholder="Birthday" name="birth" type="date" autofocus>
	                            </div>
	                            <div class="form-group">
	                                <input class="form-control" placeholder="phone" name="phone" type="tel" autofocus>
	                            </div>
	                            <!-- Change this to a button or input when using this as a form -->
	                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Join">
	                        </fieldset>
	                    </form>
	                </div>
	            </div>
	            <div class="login-panel panel panel-default login-sub-panel">
	                <p><a href="/">로그인하기</a></p>
	            </div>
	        </div>
	    </div>
	</div>


    <!-- script -->
    <script src="/assets/jquery/jquery-1.12.3.min.js"></script>
    <script src="/assets/jquery/jquery-ui-1.11.4/jquery-ui.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    
    <script src="/assets/js/default.js"></script>
</body>
</html>