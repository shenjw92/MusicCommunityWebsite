<?php
include ("../Util/DButil.php");

$concertID = $_GET["concertID"];
$score = $_POST["score"];
$username = $_SESSION[username];
// echo $username;
// echo "score is".$score;



$stmt0 = $dbh -> prepare("SELECT * FROM enroll WHERE concertID = ? AND username = ?");
$stmt0 ->bindParam(1, $concertID);
$stmt0 ->bindParam(2, $username);

$stmt0 -> execute();

if(!($row = $stmt0 -> fetch())){

?>
<script language="javascript">

alert("Come On! Join and then Rate.");

window.history.back(-1);

        //绫讳技浜庢寜閽紝鍙傛暟鏄礋鍑狅紝灏卞悗閫�鍑犳銆�
</script>

<?php
}else{


	// echo $row[username];
	$stmt1 = $dbh -> prepare("UPDATE enroll SET star = $score WHERE concertID =? AND username = ?");
	$stmt1 ->bindParam(1, $concertID);
	$stmt1 ->bindParam(2, $username);
	$stmt1 -> execute();

	echo "<script language=\"javascript\">history.go(-1);</script>";

}
?>