<?php 
    require __DIR__."/includes/bundle.php";
?>
<html>
<head>
    <title>Super Arrows</title>
</head>
<body>

<h2>Results</h2>

        <?php 
            $rf = new RoundFactory($db);
            $roundResults = $rf->getRoundResults();
            $roundScore = 0;
            foreach($roundResults as $result) {
                $roundScore += $result->points;
            }

            echo "<br/><br/>";
            echo "<br/><br/>";
            if($roundScore == 30){
                echo "You have score $roundScore points this round and have one Super Arrows!";
            } else {  
                echo "You have score $roundScore points this round!";
            }
        ?>
</body>
</html>
