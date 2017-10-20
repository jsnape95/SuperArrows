<? session_start();?>
<html>
<head>
    <title> Super Arrows Admin Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontAwesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/arrows.css"/>
</head>
<body>
    <?php include 'includes/productHeader.inc.php'; ?>
    <?php include 'includes/navBar.inc.php'; ?>
    <? include 'includes/connection.php';?>
    <div class='container'>
        <div align="center">
        <h1 class='text-bg'>Welcome Admin</h1>

        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <a href='/adminmatches.php'> 
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2>Matches</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href='/adminresult.php'> 
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2>Results</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <a href='/adminplayers.php'> 
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2>Players</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href='/adminusers.php'> 
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2>Users</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>

</div>
    </div>
    <?php require __DIR__."/includes/scripts.php"; ?>
</body>
</html>
