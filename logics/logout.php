<?php
include('../includes/session.inc.php');
//logout code
if(isset($_COOKIE[session_name()])){
// match PHPSESSID settings
setcookie(session_name(), '', time()-3600, '/~<yourID>', 'homepages.shu.ac.uk', 1, 1);
// clear the Session cookie
}
$_SESSION = array();
// empty the array
session_destroy();
//destroy the session
header("location:../index.php");
//to redirect
exit();
?>