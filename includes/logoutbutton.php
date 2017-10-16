<?php 
session_start();
?>
<div id="login">
<p><?php echo "Welcome " . $_SESSION['admin']['Username']?> <a href="logics/logout.php">Log Out</a></p>
</div>