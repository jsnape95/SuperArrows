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

    <?php 
    function GetPlayers()
    {
        g
    $playerfac = new PlayerFactory($db);

    $allplayers = $playerfac->getAllPlayers();
    
    var_dump($allplayers);
    // echo $allps[0]['player1first'];
    }

    ?>


         </body>
</html>
