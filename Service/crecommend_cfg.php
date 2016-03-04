<?php
include ("../Util/DButil.php");
$rname = htmlspecialchars($_POST[rname]);

$stmt = $dbh->prepare("SELECT * from type where typename = ?");
$stmt->bindParam(1, $_POST[type]);
$stmt->execute();
$row = $stmt->fetch();
$typeid=$row[0];

$stmt = $dbh->prepare("Insert Into recommend(rid,rname,username,typeid,rtime) Values(null,?,?,?,now())");
$stmt->bindParam(1, $rname);
$stmt->bindParam(2, $_SESSION[username]);
$stmt->bindParam(3, $typeid);
$stmt->execute();

echo "<script language=\"javascript\">location.href='../recommend.php';</script>";
?>
