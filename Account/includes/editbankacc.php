<?php
  /**********EDIT BANK ACCOUNT**********/

  require_once '../Database/connectdatabase.php';

  /*ERROR CHECKING*/
  // define variables and set to empty values
  $accNoErr = $accNameErr = "";
  $accNo = $accName = "";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["accountno"])) {
      $accNoErr = "Account number is required";
    } else {
      $accNo = test_input($_POST["accountno"]);
      /*// check if phone number is well-formed
      if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/",$phoneNo)) {
        $phoneNoErr = "Invalid phone number format";
      }*/
    }

    if (empty($_POST["accountname"])) {
      $accNameErr = "Account name is required";
    } else {
      $accName = test_input($_POST["accountname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$accName)) {
        $accNameErr = "Only letters and white space allowed";
      }
    }

    if($accNoErr=="" && $accNameErr==""){

      if(isset($_SESSION['uid'])){
        $uid = $_SESSION['uid'];
      }

      $sql = "UPDATE bankaccount SET Account_No='$accNo', Account_Name='$accName' WHERE User_ID='$uid'";

      if(mysqli_query($conn,$sql)){
        header('Location: mainpage.php');
        exit();
      }
    }
  }


?>
