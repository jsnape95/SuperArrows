<div id="navHeader">
    <div class="container">
        <div class="mart-0 pad-5">
        <div id="logoDiv" class="disp-in padb-2 fs-4">
                    <a href="../index.php"><img src="../img/logo2.png" alt="logo" class="center"></a>
                </div>
        </div>
        <div class="disp-block" style="margin-top:6%; margin-left:15%">
        <ul id="navList" class="list-inline">
            <?
                if(isset($_SESSION['admin']))
                {
                    echo "<li><a href='logics/authorize.php'>Admin Page</a></li>";
                }
            ?>
                <li><a href='generateResults.php'>View Results</a></li>


                <?
            if(isset($_GET['failed'])){
                echo "Login has failed!";
            }
            if (isset($_SESSION['user']))
            {
                include "includes/logoutbutton.php";
            }
            if(isset($_SESSION['admin']))
            {
                include "includes/logoutbutton.php";
            }
            if(empty($_SESSION))
            {
                        include "includes/login.php";
            }
                ?>
            </ul>
        </div>
    </div>
</div>
</div>


<!-- jbkjbk -->
