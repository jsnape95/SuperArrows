<?php 
require __DIR__."/includes/bundle.php";
?>
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
        <form method="POST" action="adminsave.php">
            <?php 
                $mf = new MatchFactory($db);
                $q = $mf->getRoundMatches();

                $matches = serialize($q);

                foreach($q as $match) {
                    echo "<p>$match->player1First $match->player1Last vs $match->player2First $match->player2Last (6) 180s</p>";
                    echo "<input type='number' name='player1score[]' min='0'/>";
                    echo "<input type='number' name='player2score[]' min='0'/>";
                    echo "<input type='number' name='no180s[]' min='0'/>";
                    echo "<input type='hidden' name='matches' value='".$matches."'/>";
                }
            ?>
            <input type='submit'/>
        </form>
    </div>
    <?php require __DIR__."/includes/scripts.php"; ?>
</body>
</html>