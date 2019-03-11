<?php
	session_start(); 
	include_once 'header.php'
	

?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Messages</h2>
		<br>
		<br>

		<?php
	



			if(isset($_SESSION['u_uid'])){

				$cur_u_uid = $_SESSION['u_uid'];

				//SELECT FRIEND
				$sql = "SELECT * FROM users_vs WHERE user_uid != '$cur_u_uid' ORDER BY user_id DESC";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				echo"<div class = 'inbox_friend_list' style='float: left; overflow-y: scroll; height:300px;'>";
				echo"<form class='location-form' action ='includes/message.inc.php' method='POST'>";
				
				echo"<button type='submit' style='float: left;' name='user_lookup'>Find User</button>";
				echo"<br>";echo"<br>";echo"<br>";
				echo"Users: &nbsp&nbsp&nbsp";

				if($resultCheck > 0){
					for($i = 0; $i < $resultCheck; $i++)
					{
						if($row = mysqli_fetch_assoc($result)){
							$friend_name = $row['user_uid'];
							echo"<div style='display:block;'><input type='radio' name='radio' value='{$row['user_uid']}' style='float: left;'><label style='font-size: 12px;''>$friend_name&nbsp;&nbsp;&nbsp;</label></div>";
				
						}
					}	
				}
				
				echo"</div>";
				echo"<div class = 'inbox_message_box'>";
				$selected_friend = $_SESSION['selected_friend'];
				
				//disply the locations of the user you selected
				$sql1 = "SELECT * FROM location_AL INNER JOIN users_vs ON location_AL.added_by = users_vs.user_uid WHERE users_vs.user_uid = '$selected_friend'";
				$result = mysqli_query($conn, $sql1);
				$resultCheck = mysqli_num_rows($result);
				echo"Write Your Message to: &nbsp;&nbsp;&nbsp;$selected_friend&nbsp;&nbsp;&nbsp;who has been to:";
				echo"<br>";
				if($resultCheck > 0){
					for($i = 0; $i < $resultCheck; $i++)
					{
						if($row = mysqli_fetch_assoc($result)){
							
							echo"<div style='display:block;'><label style='font-size: 12px;''>{$row['Location_name']}&nbsp;in&nbsp;{$row['Location_city']}&nbsp;{$row['Location_state']},&nbsp;{$row['Location_country']}&nbsp;&nbsp;&nbsp;</label></div>";
				
						}
					}	
				}


				//COMPOSE MESSAGE

				//echo"<div><input size='100' type='text' name='the_message'placeholder='Write your message here'></div>";
				echo"<textarea name='the_message' cols='120' rows='15'></textarea>";
				echo"<button type='submit' name='send_message'>Send</button>";

				echo"</form>";
				echo"</div>";



				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";


				//DELETE BUTTON
				$sql = "SELECT * FROM messages WHERE user_from = '$cur_u_uid' OR user_to = '$cur_u_uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				






				//MESSAGE LIST
				//display all messages related to current user
				$sql = "SELECT * FROM messages WHERE user_from = '$cur_u_uid' OR user_to = '$cur_u_uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				echo"<div class = 'inbox_message_list' style='float:right;'>";
				echo"<form class='location-form' action ='includes/message.inc.php' method='POST'>";
				echo"Inbox: &nbsp&nbsp&nbsp";
				echo"<div class = 'inbox_message_list' style='float:right;'>";
				//echo"<form class='location-form' action ='includes/messages.inc.php' method='POST'>";
				echo"<button type='submit' name='delete_message'>Delete</button>";
				//echo"</form>";
				echo"</div>";
				if($resultCheck > 0){
					for($i = 0; $i < $resultCheck; $i++)
					{
						if($row = mysqli_fetch_assoc($result)){
							$friend_name = $row['user_uid'];
							$conv_id_num = $row['conversation_id'];
							$time_sent = $row['time_sent'];

							echo"<div class='inbox_message_list'>";

							echo"<input type='radio' name='radio_delete' value='".$time_sent."'/> Delete";
							echo"<br>";echo"<br>";
							echo"<div> From: {$row['user_from']}</div>";
							echo"<div> To: {$row['user_to']}</div>";
							echo"At: $time_sent";
							echo"<br>";echo"<br>";

							echo"<div>____________________Message________________________</div>";echo"<br>";
							echo"<div>{$row['message']}</div>";echo"<br>";
							echo"</div>";
						}
					}	
				}
				echo"</form>";
				echo"</div>";




			}
			else{
				echo"Please log in. " ;
			}

		?>

	</div>
</section>

<?php

	include_once 'footer.php'

?>