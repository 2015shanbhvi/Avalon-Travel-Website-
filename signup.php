<?php
	include_once 'header.php'

?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action ="includes/signup.inc.php" method="POST">
			<input type="text" name="user_first" placeholder="Firstname">
			<input type="text" name="user_last" placeholder="Lastname">
			<input type="text" name="user_email" placeholder="E-mail">
			<input type="text" name="user_uid" placeholder="Username">
			<!-- Because we want this visible after we do email verification  -->
			<!--<input type="password" name="user_pwd" placeholder="Password">-->
			<button type="submit" name="submit_signup">Sign up</button>
		</form>
	</div>
</section>

<?php
	include_once 'footer.php'

?>