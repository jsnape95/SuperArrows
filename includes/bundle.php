<?php

error_reporting(E_ERROR | E_PARSE);

date_default_timezone_set('UTC');

spl_autoload_register(function($className){
    $sources = array("models/$className.php", "includes/$className.php", "logics/$className.php");
    foreach($sources as $source) {
        if(file_exists($source)) {
            require_once "$source";
        }
    }
});

include "/plugins/jquery/jquery-3.2.1.min.js";
include "/plugins/bootstrap/js/bootstrap.min.js";
include "connection.php";

function getCurrentRound(){
    $currentDate = new DateTime(date("Y/m/d H:i:s"));
    $round->db->query("
        select id
        from rounds
        where 
            startdate <= $currentDate &&
            enddate >= $currentDatel
    ");
    return $round;
};

$DB = new Connection();
$db = $DB->getDb();



?>