<?php
session_start();
if (isset($_SESSION['user']))
{
    header('Location: ../index.php');
}
	if(isset($_SESSION['admin']))
	{
        header('Location: ../adminpage.php');
    }
?>