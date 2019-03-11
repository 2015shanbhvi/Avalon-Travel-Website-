<?php
	session_start();
	include_once 'header.php'

?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Verify</h2>







		<form class="signup-form" action ="includes/verify.inc.php" method="POST">
			<input type="text" name="temp_password" placeholder="Activation Code">
			<input type="password" name="new_password" placeholder="New Password">
			<button type="submit" name="submit_verify">Verify</button>
		</form>


	</div>
</section>

<?php
	include_once 'footer.php'

?>