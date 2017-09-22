<?php

require __DIR__."/includes/bundle.php";



?>

<html>
<head>
    <title>Super Arrows</title>
</head>
<body>
<h1>Welcome to Super Arrows!</h1>
<br/>
<h4><a href="logics/authorize.php">Admin Page</a>      <a href='generateResults.php'>View Results</a></h2>
    <form method="POST" action="results.php">
        <?php

$mf = new MatchFactory($db);
$q = $mf->getRoundMatches();

$matches = serialize($q);

if(count($q) == 0){
    echo "No matches scheduled";
} else {
    foreach($q as $match) {
        echo "<p>$match->player1First $match->player1Last vs $match->player2First $match->player2Last (6) 180s</p>";
        echo "<input type='number' name='player1score[]' min='0'/>";
        echo "<input type='number' name='player2score[]' min='0'/>";
        echo "<input type='hidden' name='matches' value='".$matches."'/>";
    }
    echo "<p>Golden 180's</p>";
    echo "<input type='number' name='golden180' min='0'/>";
    echo "<br/><br/>";
    echo "<input type='submit'/>";
}


?>

        


    </form>
</body>
</html>
