<?php
include ("../Util/DButil.php");

//文本过滤器
function encode($varchar) {
	$varchar=trim($varchar);   //将字符串取空白
	$varchar=addslashes($varchar);  //将单引号，双引号，斜杠加斜杠
	$varchar=htmlspecialchars($varchar);  //<>等转换成特殊字符代码
	$varchar=nl2br($varchar);   //将\n转换成<br />
	//$varchar=strtolower($varchar);转换成小写
	//河蟹
	$encode="Fuck|son of bitch|shit";
	$mode=array("/$encode/");
	$neeld=array('****');
	$varchar=preg_replace($mode,$neeld,$varchar);
	return $varchar;
}

$concertID = $_GET["concertID"];
// echo "concertID is ". $concertID;
$score = $_POST["score"];
$review = encode(htmlspecialchars($_POST["review"]));




if($review != ""){
$stmt2 = $dbh->prepare("INSERT INTO review(reviewID,username,concertID,rwcontent, reviewtime) VALUES (null, ?, ?, ?,now())");
$stmt2->bindParam(1, $_SESSION[username]);
$stmt2->bindParam(2, $_GET["concertID"]);
$stmt2->bindParam(3, $review);
$stmt2->execute();

$stmt3 = $dbh -> prepare("UPDATE user SET score = score + 1 WHERE username = ?");
$stmt3 ->bindParam(1, $_SESSION[username]);
$stmt3 ->execute();
?>




<?php
}else{
?>
<script language="javascript">

alert("Please say something, don't be shy!");

window.history.back(-1);

        //绫讳技浜庢寜閽紝鍙傛暟鏄礋鍑狅紝灏卞悗閫�鍑犳銆�

 </script>
 <?php
}
echo "<script language=\"javascript\">history.go(-1);</script>";
?>