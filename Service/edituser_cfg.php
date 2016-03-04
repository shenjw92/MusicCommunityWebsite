<?php
include ("../Util/DButil.php");
$name= htmlspecialchars($_POST[Name]);
$Birth= htmlspecialchars($_POST[Birth]);
$City= htmlspecialchars($_POST[City]);
$Email= htmlspecialchars($_POST[Email]);

$stmt = $dbh->prepare("UPDATE user set name = ?, birth = ?, city =?, email =? where username = ?");
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $Birth);
$stmt->bindParam(3, $City);
$stmt->bindParam(4, $Email);
$stmt->bindParam(5, $_SESSION["username"]);
$stmt->execute();


echo "<script language=\"javascript\">window.close();opener.location.reload();</script>";
?>