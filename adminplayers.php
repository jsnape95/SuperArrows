<?php 
    require __DIR__."/includes/bundle.php"; 
    session_start();
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
        <div align='center'>
            <h1>Admin Player</h1>
            <br>

            <?php
                $playerfac = new PlayerFactory($db);
                $players = $playerfac->getPlayers();
                ?>
                <table class='table table-responsive table-hover-me'>
                <thead>
                    <tr>
                        <th>Player ID </th>
                        <th>First Name </th>
                        <th>Last Name</th>
                        <th>Edit?</th>
                        <th>Delete? </th>
                    </tr>
                </thead>
                <tbody>
                <?
                foreach ($players as $rows){
                    echo "<tr>";
                    echo "<td>" . $rows['id'] . "</td>";        
                    echo "<td>" . $rows['playerfirst'] . "</td>";
                    echo "<td>" . $rows['playerlast'] . "</td>";
                    echo "<td><a href=/logics/updateplayer.php?id=".$rows["id"].">Edit Player</a></td>";
                    echo "<td><a href=/logics/removelogic.php?id=".$rows["id"].">Remove Player</a></td>";
                    echo "</tr>";
                }
                echo "</table>";    
                echo "<form method='POST' action='playerinsert.php'>";
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
        </tbody>
        </div>
    </body>
</html>
