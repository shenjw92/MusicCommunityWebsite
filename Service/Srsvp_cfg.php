<?php
include ("../Util/DButil.php");

$stmt = $dbh->prepare("INSERT INTO enroll(username,concertID,star, status, etime) VALUES (?, ?, NULL, 0,now())");
// $review = htmlspecialchars($_POST["review"]);
$stmt->bindParam(1, $_SESSION[username]);
$stmt->bindParam(2, $_GET["concertID"]);
// $stmt->bindParam(3, 0);
$stmt->execute();

echo "<script language=\"javascript\">history.go(-1);</script>";
?>