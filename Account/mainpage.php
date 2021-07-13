<?php session_start(); ?>

<?php include 'includes/searchprofile.php'; ?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<style>
  		@import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
  	</style>
  	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Edit Profile Page</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php include 'templates/header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="column-25">
				<?php include 'templates/sidebar.php'; ?>
			</div>
			<div class="column-75">
			  <?php $entry = mysqli_fetch_assoc($result); ?>
				<div class="content">
			        <h2 class="heading" id="">Profile Info</h2>
				        <p>
				          <label>Name</label>
				          <input type="text" readonly="true" name="name" value="<?php
				          	echo $entry['First_Name'];
				          	echo " ";
				          	echo $entry['Last_Name']; ?>">
				        </p>
				        <p>
				          <label>Username</label>
				          <input type="text" readonly="true" name="username" value="<?php echo $entry['Username']; ?>">
				        </p>
				        <p>
				          <label>Email</label>
				          <input type="text" readonly="true" name="email" value="<?php echo $entry['Email']; ?>">
				        </p>
				        <p>
				          <label>Phone Number</label>
				          <input type="number" readonly="true" name="phonenumber" value="<?php echo $entry['Phone_Number']; ?>">
				        </p>
		    	</div>
		    	<div class="content">
			        <h2 class="heading" id="">Bank Account</h2>
			        <p>
			          <label>Account No.</label>
			          <input type="number" readonly="true" name="accountno" value="<?php echo $entry['Account_No']; ?>">
			        </p>
			        <p>
			          <label>Account Name</label>
			          <input type="text" readonly="true" name="accountname" value="<?php echo $entry['Account_Name']; ?>">
			        </p>
		    	</div>
		    	<div class="content">
			        <h2 class="heading" id="">Credit Card</h2>
			        <p>
			          <label>Credit/Debit Card No.</label>
			          <input type="number" readonly="true" name="cardno" value="<?php echo $entry['Card_No']; ?>">
			        </p>
			        <p>
			          <label>Expiry Date</label>
			          <input type="date" readonly="true" name="cardexpdate" value="<?php echo $entry['Expiry_Date']; ?>">
			        </p>
			        <p>
			          <label>CSV</label>
			          <input type="number" readonly="true" name="cardcsv" value="<?php echo $entry['CSV']; ?>">
			        </p>
		    	</div>
	    	</div>
	    </div>
	</div>

  <!-- Javascript code to show/hide sidebar -->
  <?php include 'templates/footer.php'; ?>

<script>
  /* When the user clicks on the button,
  toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  // Close the dropdown if the user clicks outside of it
  window.onclick = function(e) {
    if (!e.target.matches('.dropdown-button')) {
    var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
    }
  }
</script>
</body>
</html>
