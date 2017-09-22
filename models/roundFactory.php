<?php

class RoundFactory{
    private $db;

    public function __construct(PDO $db){
        return $this->db = $db;
    }

    public function getAllRounds(){
        $result = $this->db->query("
            select * from rounds;
        ");

        $rounds = [];

        foreach($result as $r){
            $round = new Round();
            $round->id = $r['ID'];
            $round->startdate = $r['StartDate'];
            $round->enddate = $r['EndDate'];
            array_push($rounds, $round);
        }

        return $rounds;
    }
  }

?>
