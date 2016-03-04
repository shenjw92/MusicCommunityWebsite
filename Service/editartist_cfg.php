<?php
include ("../Util/DButil.php");
$name= htmlspecialchars($_POST[Name]);
$weblink= htmlspecialchars($_POST[Weblink]);
$permission= htmlspecialchars($_POST[optionsRadios]);

$stmt = $dbh->prepare("UPDATE artist set name = ?, weblink = ?, permission =? where username = ?");
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $weblink);
$stmt->bindParam(3, $permission);
$stmt->bindParam(4, $_SESSION["username"]);
$stmt->execute();


echo "<script language=\"javascript\">window.close();opener.location.reload();</script>";
?>