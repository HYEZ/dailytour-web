<?php include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HYEZ - 강의</title>
    
    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/assets/css/default.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>

    <!-- menu -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand <?php if(!$page) echo "a-active"; ?>" href="/">EDU</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav dropdown">
                <li class="dropdown <?php if($page == "client") echo "active"; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Web Client <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/client/droppable">Drag &amp; Drop</a></li>
                        <li><a href="/client/sortable">Sortable</a></li>
                        <li><a href="/client/selectable">Selectable</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/client/svg">SVG</a></li>
                        <li><a href="/client/videocontrol">Video Control</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/client/localstorage">Localstorage</a></li>
                        <li><a href="/client/indexeddb">IndexedDB</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">drop</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">PHP <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">drag &amp; drop</a></li>
                        <li><a href="#">Sortable</a></li>
                        <li><a href="#">Selectable</a></li>
                        <li><a href="#">Localstorage</a></li>
                        <li><a href="#">IndexedDB</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">drop</a></li>
                    </ul>
                </li>
                <li><a href="#">Server</a></li>
          </ul>
        </div><!--/.nav-collapse -->
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
    
    <!-- script -->
    <script src="/assets/jquery/jquery-1.12.3.min.js"></script>
    <script src="/assets/jquery/jquery-ui-1.11.4"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/default.js"></script>
</body>
</html>