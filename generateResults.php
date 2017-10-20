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
    </head>
    <body>
        <?php include_once('includes/productHeader.inc.php'); ?>
        <?php include_once('includes/navBar.inc.php'); ?>
        <div class='container'>
            <div align='center'>
                <h1 class="text-bg">Results</h1>
                <p class="text-bg">Please select a round to view your results.</p>

                <?php
                    $rf = new RoundFactory($db);
                    $rounds = $rf->getAllPreviousRounds();
                    //var_dump($rounds);
                ?>

                <select name="round-drop" id="round-drop" class="cl-black">
                    <option value="" disabled selected>--Select Round--</option>
                    <?
                        foreach($rounds as $round){
                            echo "<option value='".$round->id."'>Round ".$round->id."</option>";
                        }
                    ?>
                </select>

                <br><br>

                <div id="show-results">
                    <div class='row'>
                        <div class='col-md-4 col-md-offset-2'>
                            <div class='panel panel-default'>
                                <div class="panel-heading text-norm">
                                    <h5 id="match_0"></h5>
                                </div>
                                <div class="panel-body ">
                                    <h5 class='cl-black text-norm'>Your prediction</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1pred_0" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2pred_0" readonly/>
                                    <h5 class='cl-black'>Result</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1res_0" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2res_0" readonly/> 
                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class='panel panel-default'>
                                <div class="panel-heading text-norm">
                                    <h5 id="match_1"></h5>
                                </div>
                                <div class="panel-body">
                                    <h5 class='cl-black text-norm'>Your prediction</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1pred_1" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2pred_1" readonly/>
                                    <h5 class='cl-black'>Result</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1res_1" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2res_1" readonly/> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-md-4 col-md-offset-2'>
                            <div class='panel panel-default'>
                                <div class="panel-heading text-norm">
                                    <h5 id="match_2"></h5>
                                </div>
                                <div class="panel-body">
                                    <h5 class='cl-black text-norm'>Your prediction</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1pred_2" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2pred_2" readonly/>
                                    <h5 class='cl-black'>Result</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1res_2" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2res_2" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-4 '>
                            <div class='panel panel-default'>
                                <div class="panel-heading text-norm">
                                    <h5 id="match_3"></h5>
                                </div>
                                <div class="panel-body">
                                    <h5 class='cl-black text-norm'>Your prediction</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1pred_3" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2pred_3" readonly/>
                                    <h5 class='cl-black'>Result</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1res_3" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2res_3" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-md-4 col-md-offset-2'>
                            <div class='panel panel-default'>
                                <div class="panel-heading text-norm">
                                    <h5 id="match_4"></h5>
                                </div>
                                <div class="panel-body">
                                    <h5 class='cl-black text-norm'>Your prediction</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1pred_4" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2pred_4" readonly/>
                                    <h5 class='cl-black'>Result</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1res_4" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2res_4" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-4 '>
                            <div class='panel panel-default'>
                                <div class="panel-heading text-norm">
                                    <h5 id="match_5"></h5>
                                </div>
                                <div class="panel-body">
                                    <h5 class='cl-black text-norm'>Your prediction</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1pred_5" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2pred_5" readonly/>
                                    <h5 class='cl-black'>Result</h5>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player1res_5" readonly/>
                                    <input class="result-box cl-black" type="text" value="1" max="9" id="player2res_5" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-4 col-md-offset-4'>
                            <div class='panel panel-default'>
                                <div class="panel-heading">Results</div>
                                <div class="panel-body cl-black">
                                    <p>Correct Scores: <span id='correctScores'></span> x 5 points</p>
                                    <p>Correct Results: <span id='correctRes'></span> x 2 points</p>
                                    <h2>Total: <span id="roundPoints"></span> points</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require __DIR__."/includes/scripts.php"; ?>
        <script>
            $(document).ready(function(){

                $('#show-results').hide();

                $('#round-drop').change(function(){
                    var id = this.value;
                    
                    $.ajax({
                        url: "getRoundResults.php",
                        type: "GET",
                        data: {
                            id: id
                        },
                        success: function(data){
                            $('#show-results').show();

                            var json = JSON.parse(data);

                            var correctScores = 0;
                            var correctResults = 0;
                            var roundPoints = 0;

                            if(json.length === 0){
                                $('#show-results').empty();
                                $('#show-results').append("<p class='text-bg'>You did not submit your predictions for the selected round.</p>");
                            } else {
                                console.dir(json);
                                $(json).each(function(index, value){
                                    var match180s = json[index]['match180s'];
                                    var pred180s = json[index]['pred180s'];
                                    var player1first = json[index]['player1first'];
                                    var player1last = json[index]['player1last'];
                                    var player1prediction = json[index]['player1prediction'];
                                    var player1score = json[index]['player1score'];
                                    var player2first = json[index]['player2first'];
                                    var player2last = json[index]['player2last'];
                                    var player2prediction = json[index]['player2prediction'];
                                    var player2score = json[index]['player2score'];
                                    var points = json[index]['points'];

                                    roundPoints += points;
                                    if(points == 5){
                                        correctScores += 1;
                                    } else if(points == 2){
                                        correctResults += 1;
                                    }

                                    $("#player1pred_"+index).val(player1prediction);
                                    $("#player2pred_"+index).val(player2prediction);
                                    $("#player1res_"+index).val(player1score);
                                    $("#player2res_"+index).val(player2score);
                                    
                                    $('#match_'+index).empty();
                                    $('#match_'+index).append("<span class='cl-black'>"+player1first + " " + player1last + " vs " + player2first + " " + player2last + "</span>");
                                });
                                
                                $('#correctScores').empty();
                                $('#correctRes').empty();
                                $('#roundPoints').empty();

                                $('#correctScores').append(correctScores);
                                $('#correctRes').append(correctResults);
                                $('#roundPoints').append(roundPoints);
                                
                            }
                        }
                    });
                });
            });

            
        </script>
    </body>
</html>

