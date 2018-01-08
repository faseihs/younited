<?php

	
    
    if(isset($_GET["user_id"]))
    {
    	//database connection
	include("database.php");

	
    
    	$id = $_GET["user_id"];
        $search = $_GET["sval"];
    	$query = "SELECT * from users where id != '$id' and name LIKE '%$search%'";
    	$result = mysqli_query($con, $query) or die("nae hota bhai mujh se");
    	if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
        {
            echo "<span  class = 'bla' onclick = 'goto(this)'><a class = 'sp' href = 'other_user.php?id=".$row["id"]."'>".$row["name"]."</a></span><br />";
        }
        }
        else
        {
            echo "";
        }
    	

    	
    }
   
    
   
    

?>

