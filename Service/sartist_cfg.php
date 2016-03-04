<?php
include ("../Util/DButil.php");

$artistname = $_POST["artistname"];
$typename = $_POST["typename"];
for ($i=1; $i<41; $i++){
	unset($_SESSION['artist'.$i]);
}

try {

	$sartist_sql = "SELECT distinct artist.username, artist.name, artist.verification, artist.aimgurl FROM artist, play, type where 1= 1";
	if ($artistname != null && $artistname != ""){
		$sartist_sql = $sartist_sql." AND artist.name like ?";
	}
	if ($typename != null && $typename != ""){
		$sartist_sql = $sartist_sql." AND type.typename like ? and play.typeid = type.typeid AND artist.username = play.username";
	}
	$sartist_sql = $sartist_sql." Limit 0,40";
	$stmt = $dbh->prepare($sartist_sql);

	$i = 1;
	if($artistname != null && $artistname != ""){
		$bartistname ="%" . $artistname. "%";
		$stmt->bindParam($i, $bartistname);
		$i ++;
	}
	if($typename != null && $typename != ""){
		$btypename = "%". $typename."%";
		$stmt->bindParam($i, $btypename);
		$i ++;
	}
	
	$stmt->execute();
	$j = 0;
	while($row = $stmt->fetch()){
		$j++;
		$_SESSION['artist'.$j] = $row;
	}
	$dbh = null;
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
 	echo "<script language=\"javascript\">location.href='../artists.php?sum=$j&page=1';</script>";
?>