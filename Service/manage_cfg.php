<?php
include ("../Util/DButil.php");
if ($_GET["yes"]!=null){
	$stmt = $dbh->prepare("Update artist set verification=1 where username=?");
	$stmt->bindParam(1, $_GET["yes"]);
	$stmt->execute();
}

if ($_GET["no"]!=null){
	$stmt = $dbh->prepare("Update artist set verification=0 where username=?");
	$stmt->bindParam(1, $_GET["no"]);
	$stmt->execute();
}

echo "<script language=\"javascript\">history.go(-1);</script>";
?>