<?php
$host = 'localhost';
$dbName = 'social_network';
$user = 'danish';
$dbpassword = 'danish';
$dbCon = new PDO("mysql:host=".$host.";dbname=".$dbName, $user, $dbpassword);
$dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>