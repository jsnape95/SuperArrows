<?php require __DIR__."/includes/bundle.php"; ?>

<html>
    <head>
        <title>Super Arrows</title>
        <!-- this stylesheet thing needs changing -->
        <?php require __DIR__."/includes/stylesheets.php"; ?>
    </head>
    <body>
        <div class='row'>
            <div class='col-md-2 col-md-offset-3'>
                <p>Test</p>
            </div>
        </div>

        <h4>
            <a href="logics/authorize.php">Admin Page</a> |
            <a href='generateResults.php'>View Results</a>
        </h4>
        <hr>
        <div align='center'>
            <h1>Admin Player</h1>
            <br>

    <?
    $playerfac = new PlayerFactory($db);
    $players = $playerfac->getAllPlayers();
    echo "<table>";
    echo "<tr>";
    echo "<th>Player ID </th>";    
    echo "<th>First Name </th>";
    echo "<th>Last Name </th>";
    echo "<th>Edit? </th>";
    echo "<th>Delete? </th>";
    echo "</tr>";
    foreach ($players as $rows){
        echo "<tr>";
        echo "<td>" . $rows['id'] . "</td>";        
        echo "<td>" . $rows['playerfirst'] . "</td>";
        echo "<td>" . $rows['playerlast'] . "</td>";
        echo "<td><a href=updateplayer.php?id=".$rows["id"].">Edit Player</a></td>";
        echo "<td><a href=removelogic.php?id=".$rows["id"].">Remove Player</a></td>";
        echo "</tr>";
    }
    echo "</table>";    
    
    
echo " <form method='POST' action='playerinsert.php'>";
echo "Fill in the below fields to add a player</br>";
echo "First Name";
echo "<input type='text' name='insertfirstname'/>";
echo "Last Name";
echo "<input type='text' name='insertlastname'/>";
echo "<br/><br/>";
echo "<input type='submit'/>";
echo "</form>";
    // print_r($players[0][playerfirst]);
?>
    </body>
</html>
