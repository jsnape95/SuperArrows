<?php

class MatchFactory {

    private $db;
    public function __construct(PDO $db){
        $this->db = $db;
    }
    public function getRoundMatches() {
        $result = $this->db->query("
            select players.firstname as player1first, 
                    players.lastname as player1last, 
                    p2.firstname as player2first, 
                    p2.lastname as player2last, 
                    matches.id as matchid,
                    matches.matchdate,
                    matches.player1 as player1id,
                    matches.player2 as player2id,
                    matches.player1score,
                    matches.player2score,
                    matches.no180s,
                    matches.roundsid
            from matches
            join players
            on matches.player1 = players.id
            join players as p2
            on matches.player2 = p2.id
        ;");

        $matches = [];

        foreach($result as $m){

            $match = new Match();
            $match->id = $m['matchid'];
            $match->matchDate = $m['matchdate'];
            $match->player1Id = $m['player1id'];
            $match->player1First = $m['player1first'];
            $match->player1Last = $m['player1last'];
            $match->player2Id = $m['player2id'];
            $match->player2First = $m['player2first'];
            $match->player2Last = $m['player2last'];
            $match->player1Score = $m['player1score'];
            $match->player2Score = $m['player2score'];
            $match->match180s = $m['no180s'];
            $match->roundsId = $m['roundid'];
            array_push($matches, $match);
        }
        return $matches;
    }
    public function save(Match $match) {
        if(isset($match->id)) {
            //redirect to update
            return $this->update($match);
        }
        echo "HIT";
        $stmt = $this->db->prepare("
            insert into matches (matchdate, player1, player2, player1score, player2score, no180s, roundsid)
            values (:matchdate, :player1, :player2, :player1score, :player2score, :no180s, :roundsid)
        ");
        $result = $stmt->execute([
            'matchdate' => $match->matchDate,
            'player1' => $match->player1Id,
            'player2' => $match->player2Id,
            'player1score' => $match->player1Score,
            'player2score' => $match->player2Score,
            'no180s' => $match->match180s,
            'roundsid' => $match->roundsId
        ]);
        var_dump([
            'matchdate' => $match->matchDate,
            'player1' => $match->player1Id,
            'player2' => $match->player2Id,
            'player1score' => $match->player1Score,
            'player2score' => $match->player2Score,
            'no180s' => $match->match180s,
            'roundsid' => $match->roundsId
        ]);
        $match->id = $this->db->lastInsertId();
    }
    private function update(Match $match) {
        $stmt = $this->db->prepare("
            update matches set
                player1score = :player1score,
                player2score = :player2score,
                no180s = :no180s
            where id = :matchid
        ");
        $result = $stmt->execute([
            'player1score' => $match->player1Score,
            'player2score' => $match->player2Score,
            'no180s' => $match->match180s,
            'matchid' => $match->id
        ]);
    }
    public function fromPostArrays(array $matches, array $player1, array $player2, array $no180s) {

        foreach($matches as $val => $match) {
            $match->player1Score = $player1[$val];
            $match->player2Score = $player2[$val];
            $match->match180s = $no180s[$val];
        }
        return $matches;

    }

    public function adminFromPostArrays(array $player1, array $player2, $round){
      $matchObjs = [];

      foreach($player1 as $val => $p1) {

          $match = new Match();
          $match->player1Id = intval($p1);
          $match->roundsId = intval($round);
          $match->player1Score = null;
          $match->player2Score = null;
          $match->match180s = null;
          $match->matchDate = null;

          array_push($matchObjs, $match);
      }

      foreach($player2 as $val => $p2) {
          $match = $matchObjs[$val];
          $match->player2Id = intval($p2);
          $matchObjs[$val] = $match;
      }
      return $matchObjs;
    }
}


// insert into matches (matchdate, player1, player2, player1score, player2score, no180s, roundsid)
// values (null, 1, 1, null, null, null, 1)

?>
