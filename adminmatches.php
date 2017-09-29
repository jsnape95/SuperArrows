<?php require __DIR__."/includes/bundle.php"; ?>
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
    <form method="POST" action="submittedMatches.php">
        <?php

            $playerf = new PlayerFactory($db);
            $m = $playerf->getAllPlayers();

            $rf = new RoundFactory($db);
            $rounds = $rf->getAllRounds();

            echo "Round: <select name='round'>";
            foreach($rounds as $round) {
                echo "<option value='$round->id'>$round->id ($round->startdate - $round->enddate)</option>";
            }
            echo "</select>";
            echo "<br/><br/>";

            for($i=0; $i<=5; $i++){
                echo "<select name ='player1[]'>";
                foreach($m as $player) {
                    echo "<option value='$player->id'> $player->firstname $player->lastname</option>";
                }
                echo "</select>";
                echo " vs ";
                echo "<select name ='player2[]'>";
                foreach($m as $player) {
                    echo "<option value='$player->id'> $player->firstname $player->lastname</option>";
                }
                echo "</select>";
                echo "<br/><br/>";
            }
            echo "<input type='submit'/>";
        ?>
    </form>
    <?php require __DIR__."/includes/scripts.php"; ?>
</body>
</html>
