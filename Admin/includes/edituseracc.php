<?php
  /**********EDIT USER ACCOUNT**********/

  require_once '../Database/connectdatabase.php';


  if(isset($_GET['action'])){
    if($_GET['action'] == "search"){
      $uid = $_GET['uid'];
      $sql = "SELECT * FROM user WHERE User_ID= '$uid'";  //Search the selected user from database
      $result = mysqli_query($conn,$sql);

      $entry = mysqli_fetch_assoc($result);
    }
  }

  /*ERROR CHECKING*/
  // define variables and set to empty values
  $fNameErr = $lNameErr = $usernmErr = $emailErr = $phoneNoErr = $pwdErr = $conPwdErr = "";
  $fName = $lName = $usernm = $email = $phoneNo = $pwd = $conPwd = $bothPwd = "";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
      $fNameErr = "First name is required";
    } else {
      $fName = test_input($_POST["firstname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$fName)) {
        $fNameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["lastname"])) {
      $lNameErr = "Last name is required";
    } else {
      $lName = test_input($_POST["lastname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$lName)) {
        $lNameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["username"])) {
      $usernmErr = "Username is required";
    } else {
      $usernm = test_input($_POST["username"]);
      // check if name only contains letters and whitespace
      if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $usernm)) {
        $usernmErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["phonenumber"])) {
      $phoneNoErr = "Phone number is required";
    } else {
      $phoneNo = test_input($_POST["phonenumber"]);
      /*// check if phone number is well-formed
      if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/",$phoneNo)) {
        $phoneNoErr = "Invalid phone number format";
      }*/
    }

    if (empty($_POST["password"])) {
      $pwdErr = "Password is required";
      if(empty($_POST["confirmpassword"]))
        $conPwdErr = "Confirm password is required";
    }

    if(!empty($_POST["password"]) && !empty($_POST["confirmpassword"])) {
        $pwd = test_input($_POST["password"]);
        $conPwd = test_input($_POST["confirmpassword"]);
        // check if password and confirm password is matched
        if ($pwd != $conPwd)
          $bothPwd = "password didn't match!";
      }

    if($fNameErr=="" && $lNameErr=="" && $usernmErr=="" && $emailErr =="" && $phoneNoErr=="" && $bothPwd==""){
      $sql = "UPDATE user SET First_Name='$fName', Last_Name='$lName', Username='$usernm', Email='$email', Password='$conPwd', Phone_Number='$phoneNo' WHERE User_ID='$uid'";

      if(mysqli_query($conn,$sql)){
        header('Location: Admin_viewuseraccui.php');
        exit();
      }
    }
  }


?>
