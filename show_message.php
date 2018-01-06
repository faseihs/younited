<?php
include_once("database.php");
session_start();
if(isset($_REQUEST['id']))
{
	$sender_id = $_SESSION['id'];
	$receiver_id = $_REQUEST['id'];
	$query = mysqli_query($con,"SELECT * FROM messages WHERE (sender_id = '$sender_id' AND receiver_id = '$receiver_id') OR (sender_id = '$receiver_id' AND receiver_id = '$sender_id') ORDER BY id ASC") or die("could not find messages from database");
	while($row = mysqli_fetch_assoc($query))
	{
		if($row["sender_id"] == $sender_id)
		{
			echo '<div class="row">
                                            <div class="col-md-4" id="sender">
                                            <p >'.$row["message"].'<span class="glyphicon glyphicon-chevron-left glyphicon-align-right"></span></p>
                                            </div>
                                            <div class="divider"></div>
                                        </div>';
		}
		if($row["sender_id"] == $receiver_id)
		{
			echo '<div class="row">
                                                <div class="col-md-5" id="recipient">
                                                    <p ><span class="glyphicon glyphicon-chevron-right glyphicon-align-left"></span>&nbsp;'.$row["message"].' </p>
                                                </div>
                                                <div class="divider"></div>
                                            </div>';
		}
		

	}
}
?>