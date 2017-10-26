<?php             header('Location: adminpage.php');    
?>
<?php include_once __DIR__."/includes/bundle.php"; ?>
<?php

            $mf = new MatchFactory($db);
            $matches = $mf->adminFromPostArrays(
                    $_POST['player1'],
                    $_POST['player2'],
                    $_POST['round']
                );
                foreach($matches as $m) {
                    $mf->save($m);
                }
            $redirect = true;
            if ($redirect)
            {
            // print("Worked");
            }        
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            // header("Location: adminpage.php");    
            // print("work");          
?>