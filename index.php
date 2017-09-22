<?php 

require __DIR__."/includes/bundle.php";

?>

<html>
<head>
    <title>Super Arrows</title>
</head>
<body>
        <?php 

$mf = new MatchFactory($db);
$q = $mf->getRoundMatches();

$matches = serialize($q);

foreach($q as $match) {
    echo "<p>$match->player1First $match->player1Last vs $match->player2First $match->player2Last (6) 180s</p>";
    echo "<input type='number' name='player1score[]' min='0'/>";
    echo "<input type='number' name='player2score[]' min='0'/>";
    echo "<input type='hidden' name='matches' value='".$matches."'/>";
}
?>

        <p>Golden 180's</p>
        <input type='number' name='golden180' min='0'/>
        <br/><br/>
        <input type='submit'/>

        
    </form>
</body>
</html>
