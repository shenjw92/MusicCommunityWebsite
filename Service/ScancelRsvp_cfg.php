<?php
include ("../Util/DButil.php");
$status_1 = 1;

$stmt = $dbh->prepare("DELETE FROM enroll WHERE username = ? AND concertID = ? AND status <> ?");
// $review = htmlspecialchars($_POST["review"]);
$stmt->bindParam(1, $_SESSION[username]);
$stmt->bindParam(2, $_GET["concertID"]);
$stmt->bindParam(3, $status_1);
// $stmt->bindParam(3, 0);
$stmt->execute();

echo "<script language=\"javascript\">history.go(-1);</script>";
?>