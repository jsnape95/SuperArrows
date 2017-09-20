<?php

class resultFactory {
    private $db;
    
    public function __construct(PDO $db){
        $this->db = $db; 
    }

    public function save(match $results) {
        $stmt = $this->db->prepare("
            update matches set player1score = ?, player2score = ?    
        
        insert into matches (player1score, player2score)
            values (:player1score, player2score)
           ");

        $result = $stmt->execute([

            'player1score' => $results->player1score,
            'player2score' => $results->player2score
        ]);

        $prediction->id = $this->db->lastInsertId();
    }
}
UPDATE `SuperArrows`.`matches` SET `player1score`='1' WHERE `id`='1';
?>