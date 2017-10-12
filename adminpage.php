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
    <?php include_once('includes/productHeader.inc.php'); ?>
    <?php include_once('includes/navBar.inc.php'); ?>
    <div class='container'>
        <h1>Welcome Admin</h1>
        
        <a href='/adminmatches.php'>Matches</a>
        <a href='/adminresult.php'>Results</a>
        <a href='/adminplayers.php'>Players</a>
    
    </div>
    <?php require __DIR__."/includes/scripts.php"; ?>
</body>
</html>
