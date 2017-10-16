<?php
require __DIR__."/includes/bundle.php";
?>
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
