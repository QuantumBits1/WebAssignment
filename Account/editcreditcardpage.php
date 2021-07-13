<?php session_start(); ?>

<?php include 'includes/editcreditcard.php'; ?>

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
	    			<form id="editcreditcard-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=&uid=<?php echo $entry['User_ID']; ?>" method="post">
					    <h2 class="heading" id="editcreditcard">Edit Credit/Debit Card</h2>
					    <p>
					      <label>Credit/Debit Card No.</label>
					      <input type="text" name="cardno" value="<?php echo $cardNo; ?>" placeholder="must be 16 digits">
					      <span class="error"><?php echo $cardNoErr; ?></span>
					    </p>
					    <p>
					      <label>Expiry Date</label>
					      <input type="date" name="cardexpdate" value="<?php echo $expDate; ?>" placeholder="DD/MM/YYYY">
					      <span class="error"><?php echo $expDateErr; ?></span>
					    </p>
					    <p>
					      <label>CSV</label>
					      <input type="text" name="cardcsv" value="<?php echo $csv; ?>" placeholder="must be 3 digits">
					      <span class="error"><?php echo $csvErr; ?></span>
					    </p>
					     <button form="editcreditcard-form" class="apply-button" type="submit" name="apply" value="">Apply</button>
					</form>
				</div>
	    	</div>

	    </div>
	</div>

	<!-- Javascript code to show/hide sidebar -->
 	<?php include 'templates/footer.php'; ?>
</body>
</html>
