<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<form method="POST">
					<input type="text" style = "height: 20px; width: 300px;" name="search" placeholder="Location name, city, country, zip code">
					<button type="submit" name="search_word">Search</button>
					<button type="submit" name="clear_search">Clear</button>
		</form>
		<div class="location-container">
		<?php
			if(isset($_POST['search_word'])){
				$search = mysqli_real_escape_string($conn, $_POST['search']);//to make sure no sql injection

				$sql = "SELECT * FROM location_AL WHERE Location_name = '$search' OR Location_city = '$search' OR Location_country = '$search' OR Location_state = '$search' OR Location_type = '$search' OR  Location_type = '$search' OR Location_zip_code = '$search' OR Location_note = '$search'";//OR added_by = '$search'

				echo "Search results for  " . $search . ":<br><br>";

				$result = mysqli_query($conn, $sql);
				$queryResult = mysqli_num_rows($result);

				echo"<div class = 'table_display_region'><table border='1' cellpadding='100'>";

				if($queryResult > 0){
					echo"<tr><td>Location_name</td><td>Location_note</td><td>Location_address</td><td>Location_avg_rating</td><td>Location_city</td><td>Location_country</td><td>Location_state</td><td>Location_type</td><td>Location_zip_code</td></tr>";//<td>added_by</td>
					while($row = mysqli_fetch_assoc($result)){
						echo"<tr><td>{$row['Location_name']}</td><td>{$row['Location_note']}</td><td>{$row['Location_address']}</td><td>{$row['Location_avg_rating']}</td><td>{$row['Location_city']}</td><td>{$row['Location_country']}</td><td>{$row['Location_state']}</td><td>{$row['Location_type']}</td><td>{$row['Location_zip_code']}</td></tr>";//<td>{$row['added_by']}</td>
					}
				}
				else{
					if(empty($search)){
						echo "Your search field was empty...<br><br>";
					}
					else{
						echo "There are no results matching your search...<br><br>";
					}
				}
				echo"</table></div>";
			}
			if(isset($_POST['clear_search'])){
				$search = mysqli_real_escape_string($conn, $_POST['search']);//to make sure no sql injection
			}

		?>
		</div>
		<br>
			<?php
			if(isset($_SESSION['u_uid'])){

				//display all entries in the location database
				$sql = "SELECT * FROM location_AL;";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				//fetch the entries in the database
				echo "These are the locations in the database" . "<br>" . "<br>";

				echo"<div class = 'table_display_region'><table border='1' cellpadding='100'>";
				echo"<tr><td>Location_name</td><td>Location_note</td><td>Location_address</td><td>Location_avg_rating</td><td>Location_city</td><td>Location_country</td><td>Location_state</td><td>Location_type</td><td>Location_zip_code</td></tr>";//<td>added_by</td>

				if($resultCheck > 0) {
					while($row = mysqli_fetch_assoc($result)){
						echo"<tr><td>{$row['Location_name']}</td><td>{$row['Location_note']}</td><td>{$row['Location_address']}</td><td>{$row['Location_avg_rating']}</td><td>{$row['Location_city']}</td><td>{$row['Location_country']}</td><td>{$row['Location_state']}</td><td>{$row['Location_type']}</td><td>{$row['Location_zip_code']}</td></tr>";//<td>{$row['added_by']}</td>
					}
					echo"</table></div>";
				}

			}
			else
			{
				echo"Please log in to see all locations";
			}
			?>
	</div>
</section>

<?php
	include_once 'footer.php'
?>
