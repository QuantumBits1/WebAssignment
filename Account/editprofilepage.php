<?php
	session_start();

?>

<!-- <?php include 'includes/editprofile.php'; ?> -->

<?php include 'includes/searchprofile.php'; ?>

<!DOCTYPE html>
<html>
	<?php include 'templates/head.php'; ?>

<body>
	<?php include 'templates/sidebar.php'; ?>

	<main>
	    <div>
	    	<div></div>
	    	<div>
	    		<div>
	    			<form id="editprofile-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=search&uid=<?php echo $entry['User_ID']; ?>" method="post">
					    <h2 class="heading" id="editprofile">Edit Profile</h2>
					    <p>
					      <label>Username</label>
					      <input type="text" readonly="true" name="" value="<?php echo $entry['Username']; ?>">
					    </p>
					    <p>
					      <label>First Name</label>
					      <input type="text" name="firstname" value="<?php echo $fName; ?>" placeholder="<?php echo $entry['First_Name']; ?>">
					      <span class="error"><?php echo $fNameErr; ?></span>
					    </p>
					    <p>
					      <label>Last Name</label>
					      <input type="text" name="lastname" value="<?php echo $lName; ?>" placeholder="<?php echo $entry['Last_Name']; ?>">
					      <span class="error"><?php echo $lNameErr; ?></span>
					    </p>
					    <p>
					      <label>Email</label>
					      <input type="text" name="email" value="<?php echo $email; ?>" placeholder="<?php echo $entry['Email']; ?>">
					      <span class="error"><?php echo $emailErr; ?></span>
					    </p>
					    <p>
					      <label>Phone Number</label>
					      <input type="text" name="phonenumber" value="<?php echo $phoneNo; ?>" placeholder="<?php echo $entry['Phone_Number']; ?>">
					      <span class="error"><?php echo $phoneNoErr; ?></span>
					    </p>
					    <p>
					      <label>New Password</label>
					      <input type="password" name="password" value="<?php echo $pwd; ?>" placeholder="">
					      <span class="error"><?php echo $pwdErr; ?></span><br>
					      <label>Confirm Password</label>
					      <input type="password" name="confirmpassword" value="<?php echo $conPwd; ?>" placeholder="">
					      <span class="error"><?php echo $conPwdErr; echo $bothPwd; ?></span>
					    </p>
					     <button form="editprofile-form" class="apply-button" type="submit" name="apply" value="">Apply</button>
					</form>
				</div>
	    	</div>
	    </div>
	</main>
	
	<script src="js/toggle.js"></script>
	<script src="js/changeTitle.js"></script>
</body>
</html>
