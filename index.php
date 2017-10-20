<?php require __DIR__."/includes/bundle.php";
    session_start();
?>

<html>
    <head>
        <title>Super Arrows</title>
        <!-- this stylesheet thing needs changing -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/fontAwesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/arrows.css"/>
        <link rel="icon" href="img/logo2.ico" type="image/x-icon">
    </head>
    <body>
        <?php include_once('includes/productHeader.inc.php'); ?>
        <?php include_once('includes/navBar.inc.php'); ?>
        <div class='container'>
            <div align='center'>

                <?php
                    $rf = new RoundFactory($db);
                    $currentRound = $rf->getCurrentRound();
                    echo $currentRound->idin;

                    $mf = new MatchFactory($db);
                    $q = $mf->getRoundMatches($currentRound->id);

                    $matches = serialize($q);

                    $uf = new UserFactory($db);
                    $currentUser = $uf->getCurrentUser();

                    $pf = new PredictionFactory($db);
                    $preds = $pf->getRoundPredictions($currentRound->id, $currentUser->id);

                    echo "<div class'row'>";
                    echo    "<div class'col-md-12'>";
                    if(count($q) == 0){
                        echo "<p class='text-bg'>No matches scheduled</p>";
                        echo "</div></div>";
                    } else {
                        echo "<h1 class='text-bg'><u>Round $currentRound->id</u></h1>";

                        if(count($preds) != 0) {
                            echo "<p class='text-bg'>Predictions for this round already submitted</p>";
                            echo "</div></div>";
                        } else {
                            echo "<h3 class='text-bg'>Enter your predictions for this round.</h3>";
                            echo "</div></div>";
                            echo "<br><br>";
                            echo " <form method='POST' action='results.php'>";
                                foreach($q as $val=>$match) {
                                    $div = "";
                                    $closeDiv = "";
                                    if($val % 2 === 0){
                                        $div = "<div class='row'><div class='col-md-4 col-md-offset-2'>";
                                    } else {
                                        $div = "<div class='col-md-4'>";
                                        $closeDiv = "</div>";
                                    }
                                    echo    $div;
                                    echo        "<div class='panel panel-default'>";
                                    echo            "<div class='panel-heading text-norm' id='match_0'>";
                                    echo                "<h5>$match->player1First $match->player1Last vs $match->player2First $match->player2Last (6)</h5>";
                                    echo            "</div>";
                                    echo            "<div class='panel-body'>";
                                    echo                "<input id='p1pred_".$val."' class='p1pred mod cl-black' type='number' name='player1score[]' min='0' max='6' required/> ";
                                    echo                "<input id='p2pred_".$val."' class='p2pred mod cl-black' type='number' name='player2score[]' min='0' max='6' required/>";
                                    echo                "<input type='hidden' name='matches' value='".$matches."'/>";
                                    echo            "</div>";
                                    echo        "</div>";
                                    echo    "</div>";
                                    echo $closeDiv;
                                }
                                
                                echo "<div class='row'>";
                                echo    "<div class='col-md-4 col-md-offset-4'>";
                                echo        "<div class='panel panel-default'>";
                                echo            "<div class='panel-heading'>";
                                echo                "<h5>Golden 180's</h5>";
                                echo            "</div>";
                                echo            "<div class='panel-body cl-black'>";
                                echo                "<h5>Guess the correct amount of 180's in any match</h5>";
                                echo                "<input class='mod cl-black' type='number' name='golden180' min='0'/>";
                                echo            "</div>";
                                echo        "</div>";
                                echo    "</div>";
                                echo "</div>";
                                
                                echo "<div class='row'>";
                                echo "<div class='col-md-12'>";
                                if(empty($_SESSION)) {
                                    echo "<p class='text-danger'>You must be logged in to be able to make a prediction.</p>";
                                } else {
                                    echo "<input type='submit' class='btn btn-success'/>";
                                }
                                echo "</div>";
                                echo "</div>";
                            echo "</form>";
                        }
                    }
                ?>
            </div>
        </div>
        <?php require __DIR__."/includes/scripts.php"; ?>
        <script>

            $(document).ready(function(){
                $('.p1pred').click(function(){
                    validateSpinners($(this).attr("id"));
                });

                $('.p2pred').click(function(){
                    validateSpinners($(this).attr("id"));
                });
            });

            function validateSpinners(id){
                // alert(id);
                var array = id.split("_");
                var word = array[0];
                var number = array[1];
                
                if(word === "p1pred"){

                    var val = $('#'+word+'_'+number).val();
                    switch (val) {
                        case 0:
                            
                            break;
                        case 1:
                            
                            break;
                        case 2:
                            
                            break;
                        case 3:
                            
                            break;
                        case 4:
                            
                            break;
                        case 5:
                            
                            break;
                        case 6:
                            
                            break;
                    }

                } else if(word === "p2pred"){
                    var val = $('#'+word+'_'+number).val();
                    alert(val);
                }


                // alert(word);
                // alert(number);
            }
        </script>
    </body>
</html>
