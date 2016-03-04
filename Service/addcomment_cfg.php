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

$stmt = $dbh->prepare("INSERT INTO comment(cmid,username,ausername,ctime, cmcontent) VALUES (null, ?, ?,now(), ?)");
$comment = encode(htmlspecialchars($_POST["comment"]));

$stmt->bindParam(1, $_SESSION[username]);
$stmt->bindParam(2, $_GET["ausername"]);
$stmt->bindParam(3, $comment);
$stmt->execute();

echo "<script language=\"javascript\">history.go(-1);</script>";
?>