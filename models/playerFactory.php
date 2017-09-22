<?php


class PlayerFactory {
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function save(Player $player) {
          $stmt = $this->db->prepare("
              insert into matches (player1, player2,)
              values(:player1, :player2)
          ");

          $result = $stmt->execute([

              'player1' => $player->player1,
              'player2' => $player->player2,

          ]);

          $player->id = $this->db->lastInsertId();
      }

    public function getAllPlayers() {

        $players = $this->db->query("
            select
              id,
              players.firstname as playerfirst,
              players.lastname as playerlast
            from players
        ;");

        //loop through $p
        //create a new player and add to array

        $playerArray=[];

        foreach($players as $player){
            $p = new Player();
            $p->id=$player['id'];
            $p->firstname=$player['playerfirst'];
            $p->lastname=$player['playerlast'];
            array_push($playerArray, $p);
        }


        return $playerArray;
    }


  }

?>
