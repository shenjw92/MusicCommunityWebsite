<?php
include ("../Util/DButil.php");
$concertname= htmlspecialchars($_POST[concertname]);
$info= htmlspecialchars($_POST[info]);

$stmt = $dbh->prepare("INSERT INTO concert(concertID,concertname,info,concerttime,venueid,price,availability,posttime,ticketlink,username,cimgurl) 
									Values(null,?,?,null,null,null,null,now(),null,?,null)");
$stmt->bindParam(1, $concertname);
$stmt->bindParam(2, $info);
$stmt->bindParam(3, $_SESSION["username"]);
$stmt->execute();


echo "<script language=\"javascript\">history.go(-1);</script>";
?>