<?php

include_once("database.php");

if(isset($_GET["id"]))
{
	$id = $_GET["id"];
	
	$query = mysqli_query($con,"SELECT u.id,u.name, n.type from users u join notifications n on u.id = n.user_id1 where n.user_id2 = '$id' order by n.id desc"  ) or die("warr gye"); 
	
	while($row = mysqli_fetch_assoc($query))
	{

		if($row["type"] == "comment")
		{
		echo '<li id="noti" class="list-group-item"><a href="#" class="linkby">'.$row["name"].' &nbsp;</a>commented on your <a class="linkto" href="#">&nbsp;Post</a></li>';
		}
		if($row["type"] == "like")
		{
			echo '<li id="noti" class="list-group-item"><a href="#" class="linkby">'.$row["name"].' &nbsp;</a>liked your <a class="linkto" href="#">&nbsp;Post</a></li>';
		}
		if($row["type"] == "request")
		{
			$id = $row["id"];
			echo '<li id="noti" class="list-group-item"><a href="#" class="linkby">'.$row["name"].' &nbsp;</a>sent you a <a class="linkto" href="#">&nbsp;friend request.</a><span onclick = "accept_request(this)" class = "btn btn-success" data-id = "'.$id.'">Accept</span></li>';
		}

		if($row["type"] == "accept")
		{
			echo '<li id="noti" class="list-group-item"><a href="#" class="linkby">'.$row["name"].' &nbsp;</a>accepted your <a class="linkto" href="#">&nbsp;friend request</a></li>';
		}
	}

}
?>