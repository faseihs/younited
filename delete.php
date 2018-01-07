<?php
//including the database connection file

include("database.php");
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$result = mysqli_query($con, "DELETE FROM users WHERE id=$id");
 
//redirecting to the display page 
header("Location:cpanel.php");
?>