<?php 
require __DIR__."/includes/bundle.php";
?>
<html>
<head>
    <title> Super Arrows Admin Page</title>
    <?php require __DIR__."/includes/stylesheets.php"; ?>
</head>
<body>
    <h1>Welcome Admin</h1>
<html>
<head>
    <title>Super Arrows</title>
</head>
<body>


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
    <?php require __DIR__."/includes/scripts.php"; ?>
</body>
</html>