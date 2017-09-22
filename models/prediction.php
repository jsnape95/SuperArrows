<?php

    class Prediction {
        public $id;
        public $predictionDate;
        public $userId;
        public $numberOf180s;
        public $player1prediction;
        public $player2prediction;
        public $matchId;

        function __construct(
            $id = null,
            $predictionDate = null,
            $userId = null,
            $numberOf180s = null,
            $player1prediction = null,
            $player2prediction = null,
            $matchId = null
        ) {
            $this->id = $id;
            $this->predictionDate = $predictionDate;
            $this->userId = $userId;
            $this->numberOf180s = $numberOf180s;
            $this->player1prediction = $player1prediction;
            $this->player2prediction = $player2prediction;
            $this->matchId = $matchId;
        }

    }
?>