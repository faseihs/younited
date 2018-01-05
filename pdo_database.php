<?php
$host = 'localhost';
$dbName = 'social_network';
$user = 'root';
$dbpassword = 'root';
$dbCon = new PDO("mysql:host=".$host.";dbname=".$dbName, $user, $dbpassword);
$dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>