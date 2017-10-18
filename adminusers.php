<?php require __DIR__."/includes/bundle.php";
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
        <div align='center'>
            <h1>User Admin Panel</h1>
            <br>

            <?php
                $userfac = new UserFactory($db);
                $users = $userfac->getAllUsers();
            ?>
            <table class='table table-responsive table-hover-me'>
                <thead>
                    <tr>
                        <th>First Name </th>
                        <th>Last Name </th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>AccType </th>
                        <th>Points </th>
                        <th>Registration Date</th>
                        <th>IP Address</th>           
                        <th>Change AccType </th>
                        <th>Delete? </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($users as $rows){
                    echo "<tr>";
                    echo    "<td>" . $rows['FirstName'] . "</td>";        
                    echo    "<td>" . $rows['SecondName'] . "</td>";
                    echo    "<td>" . $rows['Username'] . "</td>";
                    echo    "<td>" . $rows['Email'] . "</td>";
                    echo    "<td>" . $rows['AccType'] . "</td>";
                    echo    "<td>" . $rows['Points'] . "</td>";
                    echo    "<td>" . $rows['RegisterDate'] . "</td>";
                    echo    "<td>" . $rows['IP'] . "</td>";
                    echo    "<td><a href=/logics/usertype.php?ID=".$rows["ID"].">Change AccType</a></td>";                    
                    echo    "<td><a href=/logics/removeuser.php?ID=".$rows["ID"].">Remove User</a></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
