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
            <br>

            <?php
                $playerfac = new PlayerFactory($db);
                $players = $playerfac->getAllPlayers();
            ?>
                        <div class='row'>
            <div class='col-md-12'>
            <div class='panel panel-default'>
            <div class='panel-heading'>
           <h1>Players</h1>
           <form method='POST' action='playerinsert.php'>
           <table class="table table-responsive table-striped cl-black tabop">
               <thead>
                   <tr>
                       <th>Player ID </th>   
                       <th>First Name </th>
                       <th>Last Name </th>
                       <th>Edit? </th>
                       <th>Delete? </th>
                   </tr>
               </thead>
               <tbody>
               <?php
                   foreach ($players as $player){
                       echo "<tr>";
                       echo "<td>" . $player->id . "</td>";        
                       echo "<td>" . $player->firstname . "</td>";
                       echo "<td>" . $player->lastname . "</td>";
                       echo "<td><a href=/logics/updateplayer.php?id=".$player->id.">Edit Player</a></td>";
                       echo "<td><a href=/logics/removelogic.php?id=".$player->id.">Remove Player</a></td>";
                       echo "</tr>";
                   }
               ?>
               </tbody>
           </table> 
           <p>Fill in the below fields to add a player</p>
           <label>First Name</label>
           <input type='text' name='insertfirstname' class='cl-black'/>
           <label>Last Name</label>
           <input type='text' name='insertlastname' class='cl-black'/>
           <br/><br/>
           <input type='submit' class='cl-black'/>
       </form>
            </tbody>
        </table>
    </body>
</html>
