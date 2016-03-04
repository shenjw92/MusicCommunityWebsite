<?php
if ($_GET[action] == search){
	echo "<script language=\"javascript\">location.href='../manage.php?artistname=$_POST[artistname]&veri=$_POST[optionsRadios]';</script>";
}
?>