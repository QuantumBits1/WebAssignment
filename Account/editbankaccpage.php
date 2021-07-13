<?php session_start(); ?>

<?php include 'includes/editbankacc.php'; ?>

<?php include 'includes/searchprofile.php'; ?>


<!DOCTYPE html>
<html>
	<?php include 'templates/head.php'; ?>

<body>
	<?php include 'templates/header.php'; ?>

	<div class="container">
	    <div class="row">
	    	<div class="column-25">
				<?php include 'templates/sidebar.php'; ?>
	    	</div>
	    	<div class="column-75">
	    		<div class="content">
						<?php
						 $entry = mysqli_fetch_assoc($result);
						 ?>
	    			<form id="editbankacc-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=&uid=<?php echo $entry['User_ID']; ?>" method="post">
					    <h2 class="heading" id="editbankacc">Edit Bank Account</h2>
					    <p>
						  <label>Account No.</label>
						  <input type="text" name="accountno" value="<?php echo $accNo; ?>" placeholder="">
						  <span class="error"><?php echo $accNoErr; ?></span>
						</p>
					    <p>
					      <label>Account Name</label>
					      <input type="text" name="accountname" value="<?php echo $accName; ?>" placeholder="">
					      <span class="error"><?php echo $accNameErr; ?></span>
					    </p>
					     <button form="editbankacc-form" class="apply-button" type="submit" name="apply" value="">Apply</button>
					</form>
				</div>
	    	</div>

	    </div>
	</div>

	<!-- Javascript code to show/hide sidebar -->
 	<?php include 'templates/footer.php'; ?>
</body>
</html>
