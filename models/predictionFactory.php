<?php

class PredictionFactory {
    
    private $db;
    
    public function __construct(PDO $db){
        $this->db = $db; 
    }

    
    public function save(Prediction $prediction) {
        if(isset($prediction->id)) {
            //redirect to update
            return $this->update($prediction);
        }

        $stmt = $this->db->prepare("
            insert into predictions (predicationdate, userid, no180s, player1prediction, player2prediction)
            values(:date, :userid, :num180s, :player1prediction, :player2prediction)
        ");

        $result = $stmt->execute([

            'date' => $prediction->predictionDate,
            'userid' => $prediction->userId,
            'num180s' => $prediction->numberOf180s,
            'player1prediction' => $prediction->player1prediction,
            'player2prediction' => $prediction->player2prediction,
            //'roundId' => $prediction->roundId
        ]);

        $prediction->id = $this->db->lastInsertId();
    }

    private function update(Prediction $prediction) {
        $stmt = $this->db->prepare("
            update predictions set
                no180s = :no180s,
                player1prediction = :player1prediction,
                player2prediction = :player2prediction
            where id = :id
        ");

        $result = $stmt->execute([
            'num180s' => $prediction->numberOf180s,
            'player1prediction' => $prediction->player1prediction,
            'player2prediction' => $prediction->player2prediction
        ]);
    }

    public function fromPostArrays(array $preds1, array $preds2) {

        $predictionObjs = [];
        
        foreach($preds1 as $val => $player1score) {

            $dt = new DateTime(date("Y/m/d H:i:s"));

            $prediction = new Prediction();
            $prediction->player1prediction = $player1score;
            $prediction->userId = 16;
            $prediction->numberOf180s = $_POST['golden180'];
            $prediction->predictionDate = $dt->format("Y-m-d H:i:s");
            $prediction->roundId = 1;

            array_push($predictionObjs, $prediction);
        }

        foreach($preds2 as $val => $player2score) {
            $prediction = $predictionObjs[$val];
            $prediction->player2prediction = $player2score;
            $predictionObjs[$val] = $prediction;
        }

        return $predictionObjs;
    }

}

?>