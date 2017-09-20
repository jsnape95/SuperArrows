<html>
    <head>
        <title>Super Arrows</title>
    </head>
    <body>
            <?php 

                $predictions = [];
                
                foreach($_POST['player1'] as $val => $player1score)
                {
                    $match = [];
                    array_push($match, $player1score);
                    $predictions[$val] = $match;
                }

                foreach($_POST['player2'] as $val => $player2score)
                {
                    $match = $predictions[$val];
                    array_push($match, $player2score);
                    $predictions[$val] = $match;
                }


            ob_start();
            var_dump($_POST);
            $write = ob_get_contents();
            $fp=fopen('testfile.txt','w');
            fwrite($fp, $write);
            fclose($fp);
            ob_end_clean();
            ?>
    </body>
</html>