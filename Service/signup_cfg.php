<?php
include ("../Util/DButil.php");

$username = htmlspecialchars($_POST["username"]);
$pswd = md5($_POST["password"]);
$name = htmlspecialchars($_POST["nickname"]);
$usertype = htmlspecialchars($_POST["optionsRadios"]);

if ($_POST["password"]!=$_POST["cpassword"]) {
	echo '<script>alert(\'Password Problem!\');history.back();</script>';
	exit;
}

$stmt = $dbh->prepare("SELECT * FROM account where username = ?");
$stmt->bindParam(1, $username);
$stmt->execute();
$row = $stmt->fetch();
if($row != null){
	echo "<script language=\"javascript\">location.href='../login.php?error=0';</script>";
}



if ($usertype == 'User'){
	$sql ="CALL user_register(?,?,?,null,null,null,null,@sp_result)";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(1, $username);
	$stmt->bindParam(2, $pswd);
	$stmt->bindParam(3, $name);
	$stmt->execute();
}else{
	$stmt = $dbh->prepare("CALL artist_register(?,?,?,null,@sp_result)");
	$stmt->bindParam(1, $username);
	$stmt->bindParam(2, $pswd);
	$stmt->bindParam(3, $name);
	$stmt->execute();
}

$dbh = null;

echo "<script language=\"javascript\">location.href='../login.php';</script>";

?>