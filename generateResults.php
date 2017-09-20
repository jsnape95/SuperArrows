<?php 
include 'includes/session.inc.php';
include 'includes/connection.php';
//include 'logics/authorize.php';

if(isset($_SESSION['login']))
{
     include('includes/session-logout.php');
}else
{ include('includes/session-login.php');
}
?>
<html>
<head>
    <title>Super Arrows</title>
</head>
<body>

<h2>Results</h2>

        <?php 

            // $file = "results.json";
            // $results = (array)json_decode(file_get_contents($file), true);

            // $data = $_POST['predictions'];
            // $predictions = unserialize($data);
            // print_r($results);
            // $points = 0;

            $predictions = $pdo->query(
                "select * from predictions"
            );


            //loop through results
            for($i=0; $i<count($predictions); $i++)
            {
                for($j=0; $j<count($predictions[$i]); $j++)
                {
                    echo $predictions[$i][$j] . " --- " . $results[$i][$j] . "<br/>";
                }
            }

            // foreach($results as $x => $result)
            // {

            //     foreach($predictions as $y => $single)
            //     {
            //         if($x == $y)
            //         {
            //             echo "$x <br/>";
            //             echo "$y <br/>";
            //             if($result[0] == $single[0] && $result[1] == $single[1])
            //             {
            //                 $points += 5;
            //             }
            //             elseif(($result[0] > $result[1] && $single[0] > $single[1])||($result[0] < $result[1] && $single[0] < $single[1]))
            //             {
            //                 $points += 2;
            //             }
            //         }
                    
                    
            //     }
            //     // echo "<p>".$game["p1"]. " vs " .$game["p2"]. " (".$game["sets"].")</p>";
            //     // echo "<input type='number' name='player1[]' min='0'/>";
            //     // echo "<input type='number' name='player2[]' min='0'/>";
                
            // }

            // for($i=0; $i<count($results); $i++)
            // {

            //     for($j=0; $j<count($predictions); $j++)
            //     {
            //         if($i == $j)
            //         {
            //             if($i["p1"] == $j[0] && $i["p2"] == $j[1])
            //             {
            //                 $points += 5;
            //             }
            //             elseif(($i["p1"] > $i["p2"] && $j[0] > $j[1])||($i["p1"] < $i["p2"] && $j[0] < $j[1]))
            //             {
            //                 $points += 2;
            //             }
            //         }
                    
                    
            //     }
            //     // echo "<p>".$game["p1"]. " vs " .$game["p2"]. " (".$game["sets"].")</p>";
            //     // echo "<input type='number' name='player1[]' min='0'/>";
            //     // echo "<input type='number' name='player2[]' min='0'/>";
                
            // }

            //loop through

            echo "<br/><br/>";
            echo "<br/><br/>";
            echo $points;

            
            
        ?>
</body>
</html>
