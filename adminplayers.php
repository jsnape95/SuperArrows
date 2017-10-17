<?php require __DIR__."/includes/bundle.php"; ?>

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
        </div>
    </body>
</html>
