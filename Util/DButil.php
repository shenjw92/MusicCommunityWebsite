<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=mzone', "root", "root") or die(mysql_error());
?>