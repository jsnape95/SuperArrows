<?php

date_default_timezone_set('UTC');

spl_autoload_register(function($className){
    $sources = array("models/$className.php", "includes/$className.php");
    foreach($sources as $source) {
        if(file_exists($source)) {
            require_once "$source";
        }
    }
});



$DB = new Connection();
$db = $DB->getDb();


?>