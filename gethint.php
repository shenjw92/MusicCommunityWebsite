<?php
include ("./Util/DButil.php");
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
	$stmt = $dbh->prepare("SELECT * FROM account where username = ?");
	$stmt->bindParam(1, $q);
	$stmt->execute();
	$row = $stmt->fetch();
	if($row != null){
		$hint = "Username Exist";
	}
	
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "You can use this name" : $hint;
?>