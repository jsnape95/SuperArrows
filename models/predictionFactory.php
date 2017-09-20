<?php

class PredictionFactory {
    private $db;
    
    public function __construct(PDO $db){
        $this->db = $db; 
    }

    public function save(Prediction $prediction) {
        $stmt = $this->db->prepare("
            insert into predictions (predictiondate, userid, no180s, player1prediction, player2prediction, roundsid)
            values(:date, :userid, :num180s, :player1prediction, :player2prediction, :roundId)
        ");

        $result = $stmt->execute([

            'date' => $prediction->predictionDate,
            'userid' => $prediction->userId,
            'num180s' => $prediction->numberOf180s,
            'player1prediction' => $prediction->player1prediction,
            'player2prediction' => $prediction->player2prediction,
            'roundId' => $prediction->roundId
        ]);

        $prediction->id = $this->db->lastInsertId();
    }
}

?>