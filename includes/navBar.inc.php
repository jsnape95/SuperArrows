<div id="navHeader">
    <div class="container">
        <div class="mart-28 padt-10">
            <div id="logoDiv" class="disp-in padb-10 fs-18">
                <a href="../index.php"><img src="../img/mirLogo.png" alt="logo"></a>
            </div>
        </div>
        <div class="disp-block" style="margin-top:7%; margin-left:23%">
        <a style="color: white; display: inline-block; float: right; white-space: nowrap; overflow:hidden; width:100px;"</a>
            <ul id="navList" class="list-inline">
                <li><a href="logics/authorize.php">Admin Page</a></li>
                <li><a href='generateResults.php'>View Results</a></li>
            </ul>
        </div>
        <div id="login-panel">
            <?
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
        </div>
    </div>
</div>

       