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
    $i = 0;
    echo "<table>";
    echo "<tr>";
    echo "<th>First Name </th>";
    echo "<th>Last Name </th>";
    echo "<th>Edit? </th>";
    echo "<th>Delete? </th>";
    echo "</tr>";
    foreach ($players as $rows){
        echo "<tr>";
        echo "<td>" . $rows['playerfirst'] . "</td>";
        echo "<td>" . $rows['playerlast'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";    
    

    // print_r($players[0][playerfirst]);
?>
         </body>
</html>
