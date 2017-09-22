<?php

require __DIR__."/includes/bundle.php";

if(isset($_SESSION['login'])) {
    include('includes/session-logout.php');
} else {
    include('includes/session-login.php');
}

?>

<html>
<head>
    <title>Super Arrows</title>
</head>
<body>

<h2><a href="logics/authorize.php">Admin Page</a></h2>
    <form method="POST" action="results.php">
        <?php

            $mf = new MatchFactory($db);
            $q = $mf->getRoundMatches();


            foreach($q as $match) {
              echo "<p>".$match->player1First." ".$match->player1Last." vs ".$match->player2First." ".$match->player2Last." (6)</p>";
                echo "<input type='number' name='player1[]' min='0'/>";
                echo "<input type='number' name='player2[]' min='0'/>";
            }
        ?>

        <p>Golden 180's</p>
        <input type='number' name='golden180' min='0'/>
        <br/><br/>
        <input type='submit'/>


    </form>
</body>
</html>
