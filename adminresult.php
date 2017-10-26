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
    <div align="center">

        <form method="POST" action="logics/adminsave.php">
        <?php

            $rf = new RoundFactory($db);
            $rounds = $rf->getAllRounds();
            $mf = new MatchFactory($db);
            

            
            // $q = $mf->getRoundMatches();
            // $matches = serialize($q);
            //
            // foreach($q as $match) {
            //     echo "<p>$match->player1First $match->player1Last vs $match->player2First $match->player2Last (6) 180s</p>";
            //     echo "<input type='number' name='player1score[]' min='0'/>";
            //     echo "<input type='number' name='player2score[]' min='0'/>";
            //     echo "<input type='number' name='no180s[]' min='0'/>";
            //     echo "<input type='hidden' name='matches' value='".$matches."'/>";
            // }
      ?>
    
    
    <h1 class='text-bg'>Welcome Admin</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3>Add Results for a Round</h3>
                </div>
                <div class="panel-body">
                    
                <select name="round" id="round-drop" class="form-control">
                <option value="" disabled selected>--Select Round--</option>
                    <?
                      foreach($rounds as $round) {
                        echo "<option value='$round->id'>$round->id ($round->startdate - $round->enddate)</option>";
                      }
                    ?>
                    </select>
                    <br>
                    <div id='message' class='cl-black'>
                    </div>
                    <div id='matches' class='cl-black'>
                        
                            <?php
                              for($i=0; $i<6; $i++){
                                echo "<div class='row'>";
                                  echo "<div class='col-md-5 text-right'>";
                                    echo "<label id='player1name_".$i."'></label>";
                                  echo "</div>";
                                  echo "<div class='col-md-2'>";
                                    echo "<input class='p1pred mod cl-black' type='number' value='1' max='9' id='player1score_".$i."' name='player1score[]'/>";
                                    echo "<input class='p2pred mod cl-black' type='number' value='1' max='9' id='player2score_".$i."' name='player2score[]'/>";
                                  echo "</div>";
                                  echo "<div class='col-md-5 text-left'>";
                                    echo "<label id='player2name_".$i."'></label>";
                                  echo "</div>";
                                echo "</div>";
                              }
                            ?>
                      <div class='row'>
                        <div class='col-md-12'>
                          <p>Match 180's</p>
                          <input type='number' name='no180s' min='0'/>
                        </div>
                      </div>
                      <div class='row'>
                        <div class='col-md-12'>
                          <input type='submit' value='Submit Results' class='btn btn-success'/>
                        </div>
                      </div>
                      
                      <input type='hidden' name='roundId' id='round-id-hidden'/>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    
      
      
      
          


        <!-- <input type='submit'/> -->
            </form>
    <?php require __DIR__."/includes/scripts.php"; ?>
    <script>

    $('#matches').hide();
    $('#message').hide();

    $('#round-drop').change(function(){
      var id = this.value;
      $.ajax({
        url: "getRoundResults.php",
        type: "GET",
        data: {
          id:id
        },
        success: function(data){
          var json = JSON.parse(data);

          if(json.length === 0){
            $('#message').hide();
          } else if(json[0]['player1score'] === 0){
            $('#message').hide();
            $('#round-id-hidden').val(json[0]['roundId']);

            $(json).each(function(index, value){
              var p1 = json[index]['player1first'] + " " + json[index]['player1last'];
              var p2 = json[index]['player2first'] + " " + json[index]['player2last'];

              $("#player1name_"+index).text(p1);
              $("#player2name_"+index).text(p2);
            });

            $('#matches').show();

          } else {
            $('#matches').hide();
            $('#message').empty();
            $('#message').append("<p>The results have already been submitted for this round.</p>");
            $('#message').show();
          }

        }
      });
    })

    </script>
</body>
</html>
