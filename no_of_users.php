<?php
include_once("database.php");
$result = mysqli_query($con,"SELECT * FROM users");
$rows = mysqli_num_rows($result);
file_put_contents("files/no_of_users.txt","$rows");
?>