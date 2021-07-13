<?php session_start(); ?>

<?php include 'includes/authenticate.php'; ?>

<!DOCTYPE html>
<html>
	<?php include 'templates/head.php'; ?>

<body>
	<?php include 'templates/header.php'; ?>

	<section class="container">
			<form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?action=login">
				<div class="row">
			  		<h2 class="heading">Log In</h2>
				</div>
				<div class="row">
					<span class="error"><?php echo $loginErr; ?></span>
					<div class="col-25">
			  			<label>Email</label>
					</div>
					<div class="col-75">
			    		<input type="text" name="email" value="<?php echo $email; ?>"/><br>
							<span class="error"><?php echo $emailErr; ?></span>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
			  			<label>Password</label>
					</div>
					<div class="col-75">
						<input type="password" name="password" value="<?php echo $pwd; ?>"><br>
						<span class="error"><?php echo $pwdErr; ?></span>
					</div>
				</div>
				<div class="row">
					<input type="submit" value="Login">
				</div>
			</form>
	</section>
	  <!-- Javascript code to show/hide sidebar -->
  <?php include 'templates/footer.php'; ?>
</body>
</html>
