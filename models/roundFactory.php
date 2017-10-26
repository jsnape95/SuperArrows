<?php

class RoundFactory{
    private $db;

    public function __construct(PDO $db){
        return $this->db = $db;
    }

    //function to convert db array to round object array
    public function toRoundArray($dbRows){
        $rounds = [];
        
        foreach($dbRows as $r){
            $round = new Round();
            $round->id = $r['ID'];
            $round->startdate = $r['StartDate'];
            $round->enddate = $r['EndDate'];
            array_push($rounds, $round);
        }
        return $rounds;
    }

    public function getAllRounds(){
        $result = $this->db->query("select * from rounds;");

        $rounds = $this->toRoundArray($result);
        return $rounds;
    }

    public function getAllPreviousRounds(){
        $dt = new DateTime(date("Y-m-d"));
        $currentDate = $dt->format("Y-m-d");

        $results = $this->db->query("
            select * 
            from rounds
            where enddate <= '$currentDate'
        ");

        $rounds = $this->toRoundArray($results);
        return $rounds;
    }
  

    
    public function getRoundResults($roundId, $userId){

        $result = $this->db->query("
            select 
                predictions.player1prediction as p1Pred,
                predictions.player2prediction as p2Pred,
                matches.player1score as p1Score,
                matches.player2score as p2Score,
                players.firstname as player1first, 
                players.lastname as player1last, 
                p2.firstname as player2first, 
                p2.lastname as player2last, 
                matches.No180s as match180s,
                predictions.No180s as pred180s
            from predictions
            join matches
                on predictions.matchid = matches.id
            join players
                on matches.player1 = players.id
            join players as p2
                on matches.player2 = p2.id
            where 
                matches.roundsid = $roundId &&
                predictions.userid = $userId
        ");

        $roundResults = [];
        
        foreach($result as $round){
            $r = new Result();
            $r->player1prediction = intval($round['p1Pred']);
            $r->player2prediction = intval($round['p2Pred']);
            $r->player1score = intval($round['p1Score']);
            $r->player2score = intval($round['p2Score']);
            $r->player1first = $round['player1first'];
            $r->player1last = $round['player1last'];
            $r->player2first = $round['player2first'];
            $r->player2last = $round['player2last'];
            $r->match180s = $round['match180s'];
            $r->pred180s = $round['pred180s'];
            $r->roundId = $roundId;

            if($r->player1score == $r->player1prediction && $r->player2score == $r->player2prediction){
                $r->points = 5;
            } elseif(
                ($r->player1score > $r->player2score && $r->player1prediction > $r->player2prediction) ||
                ($r->player1score < $r->player2score && $r->player1prediction < $r->player2prediction)
            ){
                $r->points += 2;
            }
            
            array_push($roundResults, $r);
        }

        return $roundResults;
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
