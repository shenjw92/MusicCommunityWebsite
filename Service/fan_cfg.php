<?php
include ("../Util/DButil.php");

if ($_GET["fausername"]!=null){
$stmt = $dbh->prepare("INSERT INTO fan(username,fausername) VALUES(?,?)");
$stmt->bindParam(1, $_SESSION[username]);
$stmt->bindParam(2, $_GET["fausername"]);
$stmt->execute();
}

if ($_GET["fausername2"]!=null){
	$stmt = $dbh->prepare("Delete from fan where username = ? and fausername = ?");
	$stmt->bindParam(1, $_SESSION[username]);
	$stmt->bindParam(2, $_GET["fausername2"]);
	$stmt->execute();
}
echo "<script language=\"javascript\">history.go(-1);</script>";
?>