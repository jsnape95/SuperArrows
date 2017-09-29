<?php
require __DIR__."/bundle.php";
$c = new Connection();
$db = $c->getDb();
session_start(); 
   // variable created to show the username back to the logged in user
    $submitted_username = '';
    
    // if statement to check whether the login form has been submitted
    //this also displays the log in form if it has not
    if(!empty($_POST))
    {
       //query to retrieve the users information from the database
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
        
            //runs the query in the database
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params); 

            //checks whether the user has logged in successfully or not
        //is initialized as false but will change to true when checks are made and successful
        $login_ok = false;
        //retrieve username from database if cannot find then username is wrong
        $row = $stmt->fetch();
        if($row)
        {
            // check the password by hashing inputted details then compared to
            // the stored hash
            $check_password = hash('sha256', $_POST['password'] . $row['Salt']);
            for($round = 0; $round < 65536; $round++)
            {
                $check_password = hash('sha256', $check_password . $row['Salt']);
            }
            
            if($check_password === $row['Password'])
            {
                // login check changed to true
                $login_ok = true;
            }
        }
    //    var_dump($row);
        // checks if the user has logged in successfully then sends them to the member
        //area
        // if they havent been successfull then the form is reloaded
        if ($login_ok AND $row['AccType']=='A'){
            //store the row array within the session and remove the salt and password
      //values from it (good practice)
      unset($row['Salt']);
      unset($row['Password']);
      //stores the users session data within the index user
      //checks will be made on the members area page to see if theyre logged in
      //used to retrieve users details too
      session_start();
      $_SESSION['admin'] = $row;
      // print_r($_SESSION);
      // var_dump($_SESSION);
      // redirects to the members area
      $submitted_username = htmlentities($_POST['username']);      
      header('Location: ../index.php');
      die();
      //die("Redirecting to: memberarea.php");
      }
            if ($login_ok AND $row['AccType']=='U'){
                  //store the row array within the session and remove the salt and password
            //values from it (good practice)
            unset($row['Salt']);
            unset($row['Password']);
            //stores the users session data within the index user
            //checks will be made on the members area page to see if theyre logged in
            //used to retrieve users details too
            session_start();
            $_SESSION['user'] = $row;
            // print_r($_SESSION);
            // var_dump($_SESSION);
            // redirects to the members area
            $submitted_username = htmlentities($_POST['username']);            
            header('Location: ../index.php');
            die();
            //die("Redirecting to: memberarea.php");
            }
        else
        {
            print("Login Failed.");
            $submitted_username = htmlentities($_POST['username']);
        }
    }
    
?>
