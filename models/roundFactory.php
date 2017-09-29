<?php

class RoundFactory{
    private $db;

    public function __construct(PDO $db){
        return $this->db = $db;
    }

    public function getAllRounds(){
        $result = $this->db->query("select * from rounds;");

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
  

    
    public function getRoundResults(){

        $result = $this->db->query("
            select 
                predictions.player1prediction as p1Pred,
                predictions.player2prediction as p2Pred,
                matches.player1score as p1Score,
                matches.player2score as p2Score
            from predictions
            join matches
            on predictions.matchid = matches.id
            where matches.roundsid = 1
        ");

        $rounds = [];
        
        foreach($result as $round){
            $r = new Result();
            $r->player1prediction = intval($round['p1Pred']);
            $r->player2prediction = intval($round['p2Pred']);
            $r->player1score = intval($round['p1Score']);
            $r->player2score = intval($round['p2Score']);

            if($r->player1score == $r->player1prediction && $r->player2score == $r->player2prediction){
                $r->points = 5;
            } elseif(
                ($r->player1score > $r->player2score && $r->player1prediction > $r->player2prediction) ||
                ($r->player1score < $r->player2score && $r->player1prediction < $r->player2prediction)
            ){
                $r->points += 2;
            }
            
            array_push($rounds, $r);
        }

        return $rounds;
    }

    public function getCurrentRound(){
        $dt = new DateTime(date("Y-m-d"));
        $currentDate = $dt->format("Y-m-d");

        $result = $this->db->query("
            select *
            from rounds
            where 
                startdate <= '$currentDate' &&
                enddate >= '$currentDate'
        ");

        foreach($result as $r){
            $round = new Round();
            $round->id = intval($r['ID']);
            $round->startDate = $r['StartDate'];
            $round->endDate = $r['EndDate'];    
        }

        
        return $round;
    }
}

?>
