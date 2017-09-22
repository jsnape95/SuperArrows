<?php require __DIR__."/includes/bundle.php"; ?>

<html>
    <head>
        <title>Super Arrows</title>
    </head>
    <body>
            <?php

            $mf = new MatchFactory($db);
            $matches = $mf->adminFromPostArrays(
                $_POST['player1'],
                $_POST['player2'],
                $_POST['round']
            );

            var_dump($matches);

            foreach($matches as $m) {
                $mf->save($m);
            }

                //$matches = [];

                // foreach($_POST['player1'] as $val => $player1score)
                // {
                //     $match = [];
                //     array_push($match, $player1score);
                //     $matches[$val] = $match;
                // }
                //
                // foreach($_POST['player2'] as $val => $player2score)
                // {
                //     $match = $predictions[$val];
                //     array_push($match, $player2score);
                //     $predictions[$val] = $match;
                // }


            // ob_start();
            // var_dump($_POST);
            // $write = ob_get_contents();
            // $fp=fopen('testfile.txt','w');
            // fwrite($fp, $write);
            // fclose($fp);
            // ob_end_clean();
            ?>
    </body>
</html>
