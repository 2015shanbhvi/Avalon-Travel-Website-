<?php
	include_once 'header.php'
	

?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Add Location</h2>
			
		<?php
	



			if(isset($_SESSION['u_uid'])){


				echo"<span>";

				echo"<form class='location-form' action ='includes/addLocation.inc.php' method='POST'>";
				echo"<input type='text' name='Location_name' placeholder='name'>
					<input type='text' name='Location_note'placeholder='note'>
					<input type='text' name='Location_address' placeholder='address'>
					<input type='text' name='Location_avg_rating' placeholder='avg_rating'>
					<input type='text' name='Location_city' placeholder='city'>
					<input type='text' name='Location_country' placeholder='country'>
					<input type='text' name='Location_state' placeholder='state'>
					<input type='text' name='Location_type' placeholder='type'>
					<input type='text' name='Location_zip_code' placeholder='zip_code'>";
				echo"<button type='submit' name='submit'>Add Location</button>";
				echo"</form>";

				echo"</span>";

				echo"<span>";
				echo"<form class='location-form' action ='includes/addLocation.inc.php' method='POST'>";
				echo"<input type='text' name='Location_name_delete' placeholder='name'>
					<button type='submit' name='delete'>Delete</button>
					<input type='text' name='Location_name_update_loc' placeholder='Location'>
					<input type='text' name='Location_name_update_note' placeholder='Note'>
					<button type='submit' name='update'>Update</button>";
				
				/*echo"<div style ='display: inline-block'>
					<input type='radio' name='radio_zip_code' value='zip_code'>zip_code
					<input type='radio' name='radio_city' value='city'>city
					<input type='radio' name='radio_state' value='state'>state
					<input type='radio' name='radio_type' value='type'>type </div>
					<button type='submit' name='find_friends'>Find Friends</button>";*/
				echo"</form>";

				echo"</span>";
				


				echo "<h1>____________________________________________________________________________________________________________________________</h1>";
				echo "<br>";
				echo "<br>";echo "<br>";
				echo "<br>";
				echo "<br>";
				/*echo"<div class = 'table_display_region'><table border='1' cellpadding='100'>";*/
				//get friend's name:

				//echo"Recommended Friend: ";
				//DISPLAY RECOMMENDED FRIENDS 
				//display the most "checked" username:
				//	looking at a table of all checked locations, find the most frequent username
				/*$sql = "SELECT added_by
					    FROM     (SELECT * FROM location_AL WHERE checked = '1') as checked_table
					    GROUP BY added_by
					    ORDER BY COUNT(*) DESC
					    LIMIT    1;   
	    				";*/
	    		/*$sql = "SELECT added_by FROM location_AL WHERE checked = '1'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				echo "{$row['added_by']}";echo "{$row['added_by']}";echo "{$row['added_by']}";





				$sql = "SELECT * FROM location_AL WHERE checked = '1'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck > 0){
					for($i = 0; $i < $resultCheck; $i++)
					{
						if($row = mysqli_fetch_assoc($result)){
					echo"<tr><td>{$row['Location_name']}</td><td>{$row['Location_note']}</td><td>{$row['Location_address']}</td><td>{$row['Location_avg_rating']}</td><td>{$row['Location_city']}</td><td>{$row['Location_country']}</td><td>{$row['Location_state']}</td><td>{$row['Location_type']}</td><td>{$row['Location_zip_code']}</td><td>{$row['added_by']}</td></tr>";
				
				

						}
					}	
					

				}
				echo"</table></div>";*/
				//CLEAR everything marked checked so that future queries can work
				$cur_u_uid = $_SESSION['u_uid'];
				$sql = "UPDATE location_AL SET checked = '0' WHERE checked = '1';";
				$result = mysqli_query($conn, $sql);


			}
			else
			{
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "Please log in my dude";
			}

			?>


			<?php




			if(isset($_SESSION['u_uid'])){


				//$sql = "SELECT * FROM location_AL";

				$sql = "SELECT * FROM location_AL WHERE added_by = '$cur_u_uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				echo"<div class = 'table_display_region'><table border='1' cellpadding='100'>";
				echo"Your Locations";
				echo"<tr><td>Location_name</td><td>Location_note</td><td>Location_address</td><td>Location_avg_rating</td><td>Location_city</td><td>Location_country</td><td>Location_state</td><td>Location_type</td><td>Location_zip_code</td><td>added_by</td></tr>";

				if($resultCheck > 0){
					for($i = 0; $i < $resultCheck; $i++)
					{
						if($row = mysqli_fetch_assoc($result)){
					echo"<tr><td>{$row['Location_name']}</td><td>{$row['Location_note']}</td><td>{$row['Location_address']}</td><td>{$row['Location_avg_rating']}</td><td>{$row['Location_city']}</td><td>{$row['Location_country']}</td><td>{$row['Location_state']}</td><td>{$row['Location_type']}</td><td>{$row['Location_zip_code']}</td><td>{$row['added_by']}</td></tr>";
				
				

						}
					}	
					
	
				}
				echo"</table></div>";

			?>

			<br>
			<br>
			<br>
			<br>
			<br>

			<?php

















				/*$sql = "SELECT * FROM location_AL ORDER BY Location_ID";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				echo"<div class = 'table_display_region'><table border='1' cellpadding='100'>";
				echo"All Locations";
				echo"<tr><td>Location_name</td><td>Location_note</td><td>Location_address</td><td>Location_avg_rating</td><td>Location_city</td><td>Location_country</td><td>Location_state</td><td>Location_type</td><td>Location_zip_code</td><td>added_by</td></tr>";

				if($resultCheck > 0){
					for($i = 0; $i < $resultCheck; $i++)
					{
						if($row = mysqli_fetch_assoc($result)){
					echo"<tr><td>{$row['Location_name']}</td><td>{$row['Location_note']}</td><td>{$row['Location_address']}</td><td>{$row['Location_avg_rating']}</td><td>{$row['Location_city']}</td><td>{$row['Location_country']}</td><td>{$row['Location_state']}</td><td>{$row['Location_type']}</td><td>{$row['Location_zip_code']}</td><td>{$row['added_by']}</td></tr>";
				
				

						}
					}	
					
				}
				echo"</table></div>";*/
			}
			?>


	</div>


			
</section>

<?php

	include_once 'footer.php'

?>