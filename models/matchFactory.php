<?php


class MatchFactory {
    private $db;
    
    public function __construct(PDO $db){
        $this->db = $db; 
    }

    public function getRoundMatches() {
        $q = $this->db->query("

            select players.firstname as player1first, 
                    players.lastname as player1last, 
                    p2.firstname as player2first, 
                    p2.lastname as player2last 
            from matches
            join players 
            on matches.player1 = players.id
            join players as p2 
            on matches.player2 = p2.id
        ;");
        return $q;
    }


    
}

?>