<?php session_start(); ?>

<?php include 'includes/authenticate.php'; ?>

<!DOCTYPE html>
<html>
	<?php include 'templates/head.php'; ?>

<body>
	<?php include 'templates/header.php'; ?>

	<section class="container">
		<div class="column">
	<form class="signup-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?action=signup">
		<div class="row">
	  		<h2 class="heading">Sign Up</h2>
		</div>
		<div class="row">
			<div class="col-25">
			<label>First Name</label>
			</div>
			<div class="col-75">
			<input type="text" name="firstname" value="<?php echo $fName; ?>" placeholder="John"/><br>
			<span class="error"><?php echo $fNameErr; ?></span>
			</div>
		</div>

		<div class="row">
			<div class="col-25">
			<label>Last Name</label>
			</div>
			<div class="col-75">
			<input type="text" name="lastname" value="<?php echo $lName; ?>" placeholder="Doe"/><br>
			<span class="error"><?php echo $lNameErr; ?></span>
			</div>
		</div>

		<div class="row">
			<div class="col-25">
			<label>Username</label>
			</div>
			<div class="col-75">
			<input type="text" name="username" value="<?php echo $usernm; ?>"/><br>
			<span class="error"><?php echo $usernmErr; ?></span>
			</div>
		</div>

		<div class="row">
			<div class="col-25">
			<label>Email</label>
			</div>
			<div class="col-75">
			<input type="text" name="email" value="<?php echo $email; ?>" placeholder="abc123@example.com"/><br>
			<span class="error"><?php echo $emailErr; ?></span>
			</div>
		</div>

		<div class="row">
			<div class="col-25">
			<label>Phone Number</label>
			</div>
			<div class="col-75">
			<input type="text" name="phonenumber" value="<?php echo $phoneNo; ?>" placeholder="0123456789"/><br>
			<span class="error"><?php echo $phoneNoErr; ?></span>
			</div>
		</div>

		<div class="row">
			<div class="col-25">
			<label>Password</label>
			</div>
			<div class="col-75">
			<input type="password" name="password" placeholder="******"/><br>
			<span class="error"><?php echo $pwdErr; ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
			<label>Confirm Password</label>
			</div>
			<div class="col-75">
			<input type="password" name="confirmpassword" placeholder="******"/><br>
			<span class="error"><?php echo $conPwdErr; ?></span>
			<span class="error"><?php echo $bothPwdErr; ?></span>
			</div>
		</div>
		<div class="row">
			<input type="submit" name="" value="Register" title="register"/>
		</div>
	</form>
</div>
	</section>
	  <!-- Javascript code to show/hide sidebar -->
  <?php include 'templates/footer.php'; ?>
</body>
</html>
