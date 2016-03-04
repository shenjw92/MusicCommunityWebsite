<?php
include ("../Util/DButil.php");
$error = $_GET["error"];
$username = $_POST["username"];
$pswd = md5($_POST["password"]);

if ($error !=null){
	if ($_SESSION['code']!=$_POST['yzm']) {
		echo '<script>alert(\'Verification code entered is wrong!\');history.back();</script>';
		exit;
	}
}


try {
	$stmt = $dbh->prepare("SELECT * FROM account where username = ? and pswd = ?");
	$stmt->bindParam(1, $username);
	$stmt->bindParam(2, $pswd);
	$stmt->execute();
	$row = $stmt->fetch();
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}

if ($row != null){
	$_SESSION[username]=$row[username];
	$_SESSION[pswd]=$row[pswd];
	$_SESSION[level]=$row[level];

	$stmt = $dbh->prepare("SELECT * FROM artist where username = ?");
	$stmt->bindParam(1, $username);
	$stmt->execute();
	while($row = $stmt->fetch()){
		$_SESSION[level]=3;
	}

	if($_POST[checkbox]){
		setcookie('UserName',$username,time()+3600);
		setcookie('Password',$pswd,time()+3600);
	}
	else{
		setcookie('UserName',$username,time()-7200);
		setcookie('Password',$pswd,time()-7200);
	}

	echo "<script language=\"javascript\">window.close();opener.location.reload();</script>";
}else{
	if ($error != 0&&$error !=null&&$error != ''){
		$error = $error+1;
		echo "<script language=\"javascript\">location.href='../login.php?error=$error';</script>";
	}else {
		echo "<script language=\"javascript\">location.href='../login.php?error=1';</script>";
	}

}

?>