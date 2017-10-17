<?php 
session_start();
?>
<html>
<div id="login">
<p>
<?php 
if (isset($_SESSION['user']))
{
    echo "Welcome " . $_SESSION['user']['Username']?> <a href="logics/logout.php">Log Out</a><?
}

if(isset($_SESSION['admin']))
{
    echo "Welcome " . $_SESSION['admin']['Username']?> <a href="logics/logout.php">Log Out</a><?
}
?>
</p>
</div>
</html>