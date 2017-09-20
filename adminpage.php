<html>
<head>
    <title> Super Arrows Admin Page</title>
</head>
<body>
    <h1>Welcome Admin</h1>
<html>
<head>
    <title>Super Arrows</title>
</head>
<body>
    <form method="POST" action="submittedadmin.php">
        <?php 

        
            //change to 2d array
            $allGames = ["Match1", "Match2", "Match3", "Match4", "Match5", "Match6"];
            $i = 0;

            while ($i<count($allGames))
            {
            foreach($allGames as $game)
            {
                echo "<p>".$game. "</p>";
                echo "<p>Player 1 vs Player 2</p>";
                echo "<input type='text' name='player1[]'/>";
                echo "<input type='text' name='player2[]'/>";
                $i++;
            }
        }
        
            echo "<br/><br/>";
            echo "<input type='submit'/>";
            
            
            
        ?>
    </form>
</body>
</html>