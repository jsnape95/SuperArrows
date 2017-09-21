<?php


class MatchFactory {
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function save(Match $match) {
        $stmt = $this->db->prepare("
            insert into matches (matchdate, player1, player2, roundsid)
            values(:matchdate, :player1, :player2, :roundid)
        ");

        $result = $stmt->execute([

            'matchdate' => $match->matchdate,
            'player1' => $match->player1,
            'player2' => $match->player2,
            'roundsid' => $match->roundid,

        ]);

        $match->id = $this->db->lastInsertId();


    public function getRoundMatches() {
      $s = $this->db->prepare("select player1, player2 from matches where roundsid = :id");
      $s->execute(['id' => $this->id]);

      $matches = [];
      foreach ($s as $row){
          $matches[] = $row;
      }

      return $matches;

        //
        //
        // $q = $this->db->query("
        //
        //     select players.firstname as player1first,
        //             players.lastname as player1last,
        //             p2.firstname as player2first,
        //             p2.lastname as player2last
        //     from matches
        //     join players
        //     on matches.player1 = players.id
        //     join players as p2
        //     on matches.player2 = p2.id
        // ;");
        // return $q;
    }



}

?>
