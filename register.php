	<!DOCTYPE html>
<html>
<head>
	<title>Project</title>

	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="login.css">

</head>
<body>
	<?php include ("header.php"); ?>

	<div class="login">

		<?php
            if (isset($_GET['error']))
            if ($_GET['error']=="userexists") { ?>
	            <div class="alert alert-warning alert-dismissible fade in warning">
	                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                <strong>Warning!</strong> Username already exists
	            </div>
        	<?php 
        	}
        	elseif ($_GET['error']=="password_mismatch") { ?>
        		<div class="alert alert-warning alert-dismissible fade in warning">
	                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                <strong>Warning!</strong> Passwords doesn't match
	            </div>
	        <?php } ?>

		<p class="text">Register</p>	
		<form method="post" action="auth.php">
			<div class="input"><input type="text" name="name" placeholder="Full Name" required></div>
			<div class="input"><input type="text" name="username" placeholder="Username" required></div>
			<div class="input"><input type="email" name="email" placeholder="Email" required></div>
			<div class="input"><input type="text" name="phone" placeholder="Phone" minlength="10" maxlength="10" pattern="[0-9]{10}" required></div>
			<div class="input"><input type="password" name="password" placeholder="Password" required></div>
			<div class="input"><input type="password" name="confirm_password" placeholder="Confirm Password" required></div>
			<div class="submit"><input type="submit" name="register" value="Register"></div>
		</form>
	</div>
	<script type="text/javascript">
		// $(".login").hover(function (){
		// 	$(this).css("height",310);
		// 	$(this).css("width",310);
		// });
		// $(".login").mouseleave(function (){
		// 	$(this).css("height",300);
		// 	$(this).css("width",300);
		// });
	</script>

	</body>
</html>