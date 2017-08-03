<?php include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php"; ?>
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

    <?php 
    if(isset($_SESSION['user_id'])) {
    ?>
    <!-- menu -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container relative-box">
            <div>
                <div class="left-align"> 
                    <a class="navbar-brand" href="/">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="center-align">
                    <a class="navbar-brand2" href="/">Daily Tour</a>
                </div>
                <div class="right-align">
                    <a class="navbar-brand" href="/page/model/logout.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- header -->
    <header>
        <div class="jumbotron">
        </div>
    </header>
    
    <!-- content -->
    <section>
        <div class="container">
            <?php
            if($page){
                include "{$_SERVER['DOCUMENT_ROOT']}/include/sub.php";
            } else {
                include "{$_SERVER['DOCUMENT_ROOT']}/include/main.php";
            }
            ?>
        </div>
    </section>
    <?php
    } else {
        include "{$_SERVER['DOCUMENT_ROOT']}/page/view/login.php";
    }
    ?>

    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="copyright">Copyright &copy; 데일리투어 2017</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- script -->
    <script src="/assets/jquery/jquery-1.12.3.min.js"></script>
    <script src="/assets/jquery/jquery-ui-1.11.4/jquery-ui.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    
    <script src="/assets/js/default.js"></script>
</body>
</html>