<?php
include ("../Util/DButil.php");
$concertname= htmlspecialchars($_POST[concertname]);
$info= htmlspecialchars($_POST[info]);
$concerttime= htmlspecialchars($_POST[concerttime]);
$venueid= htmlspecialchars($_POST[venueid]);
if ($venueid == null || $venueid=="TBD"){
	$venueid = 100;
}
$price= htmlspecialchars($_POST[price]);
$availability= htmlspecialchars($_POST[availability]);
$ticketlink= htmlspecialchars($_POST[ticketlink]);

if ($concerttime != null){
$stmt = $dbh->prepare("Update concert set concertname = ?,info = ?,concerttime=?,venueid=?,price=?,availability=?,posttime=now(),ticketlink=? where concertID =?");
$stmt->bindParam(1, $concertname);
$stmt->bindParam(2, $info);
$stmt->bindParam(3, $concerttime);
$stmt->bindParam(4, $venueid);
$stmt->bindParam(5, $price);
$stmt->bindParam(6, $availability);
$stmt->bindParam(7, $ticketlink);
$stmt->bindParam(8, $_GET["concertID"]);
$stmt->execute();
}else{
	$stmt = $dbh->prepare("Update concert set concertname = ?,info = ?,venueid=?,price=?,availability=?,posttime=now(),ticketlink=? where concertID =?");
	$stmt->bindParam(1, $concertname);
	$stmt->bindParam(2, $info);
	$stmt->bindParam(3, $venueid);
	$stmt->bindParam(4, $price);
	$stmt->bindParam(5, $availability);
	$stmt->bindParam(6, $ticketlink);
	$stmt->bindParam(7, $_GET["concertID"]);
	$stmt->execute();
}

echo "<script language=\"javascript\">history.go(-1);</script>";
?>