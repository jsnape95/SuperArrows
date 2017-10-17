<?php

    class UserFactory{
        private $db;
        
        public function __construct(PDO $db){
            return $this->db = $db;
        }
    }

?>