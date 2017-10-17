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
        <h1>Welcome Admin</h1>

        <form method="GET" action="adminsave.php">
        <?php

            $rf = new RoundFactory($db);
            $rounds = $rf->getAllRounds();

            echo "Round: <select name='round'>";
            foreach($rounds as $round) {
                echo "<option value='$round->id'>$round->id ($round->startdate - $round->enddate)</option>";
            }

            $mf = new MatchFactory($db);
            //$q = $mf->getRoundMatches();

            // $matches = serialize($q);
            //
            // foreach($q as $match) {
            //     echo "<p>$match->player1First $match->player1Last vs $match->player2First $match->player2Last (6) 180s</p>";
            //     echo "<input type='number' name='player1score[]' min='0'/>";
            //     echo "<input type='number' name='player2score[]' min='0'/>";
            //     echo "<input type='number' name='no180s[]' min='0'/>";
            //     echo "<input type='hidden' name='matches' value='".$matches."'/>";
            // }
            echo "<input type='button' id='test'/>";
        ?>

          <div id='matches'>
            <h3>Enter the round results</h3>

          </div>


        <!-- <input type='submit'/> -->
            </form>
    <?php require __DIR__."/includes/scripts.php"; ?>
    <script>

    $('#test').click(function(){
      $.ajax({
        url: "getRoundMatches.php",
        type: "GET",
        data: {
          id:1
        },
        success: function(data){
          console.dir(data);
          var json = JSON.parse(data);

          for(var x=0; x< json.length; x++){

            var i = $('<input>').attr({'type':'number', 'name':'player1score[]', 'min': 0});

          // for(var x=0; x< json.length; x++){
          //
          //   var i = $('<input>').attr({'type':'number', 'name':'player2score[]', 'min': 0});

            $('#matches').append(i);
            console.dir(json[x]["player1First"]);
          }


          for(var x=0; x< json.length; x++){

            var i = $('<input>').attr({'type':'number', 'name':'player2score[]', 'min': 0});

}

        }
      });
    })

    </script>
</body>
</html>
