<?php

    class UserFactory{
        private $db;
        
        public function __construct(PDO $db){
            return $this->db = $db;
        }

        public function getCurrentUser(){

            $id = 0;

            if($_SESSION['admin']){
                $id = intval($_SESSION['admin']['ID']);
            } else {
                $id = $_SESSION['user']['ID'];
            }

            $result = $this->db->query("
                select *
                from users
                where id = $id
            ");

            if(!$result){
                return false;
            }

            $r = $result->fetch();

            $user = new User();
            $user->id = $r['ID'];
            $user->firstname = $r['FirstName'];
            $user->lastname = $r['SecondName'];
            $user->username = $r['Username'];
            $user->email = $r['Email'];
            $user->accountType = $r['AccType'];
            $user->totalPoints = $r['Points'];

            return $user;
        }

    }

?>