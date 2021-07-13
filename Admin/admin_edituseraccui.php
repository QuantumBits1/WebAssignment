<?php session_start(); ?>

<?php include 'includes/edituseracc.php'; ?>

<!DOCTYPE html>
<html>
  <?php include 'templates/head.php'; ?>

<body>
  <?php include 'templates/header.php'; ?>

	<div class="container">
    <form id="edituseracc-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=search&uid=<?php echo $entry['User_ID'];?>" method="post">
      <h2 class="heading" id="edituseracc">Edit <?php echo $entry['Username']; ?>'s Account</h2>
      <div class="row-form">
        <div class="col-25">
        <label>User ID</label>
      </div>
      <div class="col-75">
        <input type="text" name="" readonly="true" value="<?php echo $uid; ?>">
      </div>
      </div>
      <div class="row-form">
        <div class="col-25">
          <label>First Name</label>
        </div>
        <div class="col-75">
          <input type="text" name="firstname" value="<?php echo $fName; ?>" placeholder="abc123@example.com"><br>
          <span class="error"><?php echo $fNameErr; ?></span>
        </div>
      </div>
      <div class="row-form">
        <div class="col-25">
          <label>Last Name</label>
        </div>
        <div class="col-75">
          <input type="text" name="lastname" value="<?php echo $lName; ?>" placeholder="Doe"><br>
          <span class="error"><?php echo $lNameErr; ?></span>
        </div>
      </div>
      <div class="row-form">
        <div class="col-25">
          <label>Username</label>
        </div>
        <div class="col-75">
          <input type="text" name="username" value="<?php echo $usernm; ?>" placeholder="JohnDoe9"><br>
          <span class="error"><?php echo $usernmErr; ?></span>
        </div>
      </div>
      <div class="row-form">
        <div class="col-25">
        <label>Email</label>
        </div>
        <div class="col-75">
          <input type="text" name="email" value="<?php echo $email; ?>" placeholder="JohnDoe9@gmail.com"><br>
          <span class="error"><?php echo $emailErr; ?></span>
        </div>
      </div>
      <div class="row-form">
        <div class="col-25">
          <label>Phone Number</label>
        </div>
        <div class="col-75">
          <input type="text" name="phonenumber" value="<?php echo $phoneNo; ?>" placeholder="0123456789"><br>
          <span class="error"><?php echo $phoneNoErr; ?></span>
        </div>
      </div>
      <div class="row-form">
        <div class="col-25"
          <label>Password</label>
        </div>
        <div class="col-75">
          <input type="password" name="password" value="<?php echo $pwd; ?>" placeholder="********"><br>
          <span class="error"><?php echo $pwdErr; ?></span>
        </div>
      </div>
      <div class="row-form">
        <div class="col-25">
          <label>Confirm Password</label>
        </div>
        <div class="col-75">
          <input type="password" name="confirmpassword" value="<?php echo $conPwd; ?>" placeholder="********"><br>
          <span class="error"><?php echo $conPwdErr; echo $bothPwd; ?></span>
        </div>
      </div>
    </form>
    <div class="buttons-group">
      <input type="submit" class="cancel-button" name="cancel" value="Cancel" onclick="goPrev()">

      <form class="suspenduseracc-form" action="includes/suspenduseracc.php?action=suspend&uid=<?php echo $entry['User_ID'];?>" method="post">
      <?php if($entry['Account_Status']=='Suspend'){ ?>
        <input type="submit" class="suspend-button" name="status" value="Unsuspend">
      <?php } else { ?>
        <input type="submit" class="suspend-button" name="status" value="Suspend">
      <?php } ?>
      </form>

      <button form="edituseracc-form" class="apply-button" type="submit" name="apply" value="">Apply</button>
    </div>
  </div>

  <!-- Javascript code to show/hide sidebar -->
  <?php include 'templates/footer.php'; ?>

  <!-- Javascript code for Cancel button -->
  <script>
    function goPrev()
    {
      document.write(document.referrer);
      window.history.back();
    }
  </script>

</body>
</html>
