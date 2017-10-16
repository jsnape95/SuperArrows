<?php
require __DIR__."/bundle.php";
$c = new Connection();
$db = $c->getDb();
    $submitted_username = '';

    if(!empty($_POST))
    {
        $query = "SELECT
                Username,
                Password,
                Salt,
                Email,
                AccType
            FROM users
            WHERE
                Username = :username";
        
        $query_params = array(
            ':username' => $_POST['username']);
        
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params); 

        $login_ok = false;
        $row = $stmt->fetch();
        if($row)
        {
            $check_password = hash('sha256', $_POST['password'] . $row['Salt']);
            for($round = 0; $round < 65536; $round++)
            {
                $check_password = hash('sha256', $check_password . $row['Salt']);
            }
            
            if($check_password === $row['Password'])
            {
                                $login_ok = true;
            }
        }

        if ($login_ok AND $row['AccType']=='A'){
      unset($row['Salt']);
      unset($row['Password']);
      session_start();
      $_SESSION['admin'] = $row;
      $submitted_username = htmlentities($_POST['username']);      
      header('Location: ../index.php');
      die();
      }
            if ($login_ok AND $row['AccType']=='U'){
            unset($row['Salt']);
            unset($row['Password']);
            session_start();
            $_SESSION['user'] = $row;

            $submitted_username = htmlentities($_POST['username']);            
            header('Location: ../index.php');
            die();
            }
        else
        {
            print("Login Failed.");
            $submitted_username = htmlentities($_POST['username']);
        }
    }
    
?>
