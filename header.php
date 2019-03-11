<?php
	session_start();
	include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
			</ul>
			
			<ol>
				<li><a href="addLocation.php">Add Location</a></li>
			</ol>
			<ul>
				<li></li>
			</ul>

			<ul>
				<li><a href="message.php">Inbox</a></li>
				<?php
				if(isset($_SESSION['u_uid'])){
					$cur_u_uid = $_SESSION['u_uid'];
					$sql = "SELECT * FROM messages WHERE user_from = '$cur_u_uid' OR user_to = '$cur_u_uid'";
					$result = mysqli_query($conn, $sql);
					$resultCheck1 = mysqli_num_rows($result);
					//$row = mysqli_fetch_assoc($result);
					echo "&nbsp;($resultCheck1)";
				}
				else{
					echo "";
				}
					
					
				?>
			</ul>
		     
		      


			<div class="nav-login">
			<?php
			  if (isset($_SESSION['u_id'])){
			    echo '<form action="includes/logout.inc.php" method="POST">
			          <button type="submit" name="submit">Logout</button>
			          </form>';
			  }else{
			    echo'<form action="includes/login.inc.php" method="POST">
			    			 <input type="text" name="user_uid" placeholder="Username/email">
			    			 <input type="password" name="user_pwd" placeholder="password">
			    			 <button type="submit" name="submit">Login</button>
			    			</form>
			    			<a href="signup.php">Sign up</a>';
			  }
			  if (isset($_SESSION['u_uid'])){
					echo $_SESSION['u_uid'];
					echo " you are logged in" . "<br>" . "<br>" . "<br>";
				}
			?>
			</div>
		</div>
	</nav>
</header>
