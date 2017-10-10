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

        $results=$players->fetchAll();
        return $results;
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
   public function GetPlayers()
    {
    $allplayers = $this->getAllPlayers();
    // echo "<p>$players->player1First $players->player1Last vs $players->player2First $players->player2Last (6)</p>";
    // echo "test";
    // var_dump($allplayers);
    }
  }  
?>