<?php
session_start();
class Connection{
    public function getDb()
    {
        $host = '127.0.0.1';
        $db = 'superarrows';
        $user = 'admin';
        $pass = 'admin';

        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);

        return $pdo;
    }
}

<<<<<<< HEAD


=======
>>>>>>> NathansBranch


?>
