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
        public function getAllUsers(){

            $users= $this->db->query("select * from users");

            $results=$users->fetchAll();
            return $results;
            var_dump($results);

        }
        public function deleteUser(){
            $stmt = $this->db->prepare("
            delete from users where id = :id
            ");
      
            $result = $stmt->execute([
                'id' => $_GET['ID']
            ]);
        }
    public function changeType()
    {
      $stmt = $this->db->prepare("
      update users
      set AccType = CASE WHEN AccType = 'U' THEN 'A' ELSE 'U' END  
      where id = :id"
    );
      $result = $stmt->execute([
          'id' => $_GET['ID']
      ]);
    }    
}
?>