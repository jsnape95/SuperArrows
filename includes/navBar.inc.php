<div id="navHeader">
    <div class="container">
        <div class="mart-28 padt-10">

        </div>
        <div class="marl-25p" style="margin-auto;">
            <ul id="navList" class="list-inline">
            <?
                if(isset($_SESSION['admin']))
                {
                    echo "<li><a href='logics/authorize.php'>Admin Page</a></li>";
                }
            ?>
                <li><a href='registerform.php'>Register</a></li>
                <li><a href='generateResults.php'>View Results</a></li>

                <div id="logoDiv" class="disp-in padb-10 fs-18">
                    <a href="../index.php"><img src="../img/logo2.png" alt="logo" class="center"></a>
                </div>

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
