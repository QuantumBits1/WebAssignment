<?php
  /**********EDIT BANK ACCOUNT**********/

  require_once '../Database/connectdatabase.php';

  /*ERROR CHECKING*/
  // define variables and set to empty values
  $cardNoErr = $expDateErr = $csvErr = "";
  $cardNo = $expDate = $csv = "";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["cardno"])) {
      $cardNoErr = "Credit/debit card no. is required";
    } else {
      $cardNo = test_input($_POST["cardno"]);
      /*// check if phone number is well-formed
      if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/",$phoneNo)) {
        $phoneNoErr = "Invalid phone number format";
      }*/
    }

    if (empty($_POST["cardexpdate"])) {
      $expDateErr = "Expiry date is required";
    } else {
      $expDate = test_input($_POST["cardexpdate"]);
      /*// check if phone number is well-formed
      if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/",$phoneNo)) {
        $phoneNoErr = "Invalid phone number format";
      }*/
    }

    if (empty($_POST["cardcsv"])) {
      $csvErr = "CSV number is required";
    } else {
      $csv = test_input($_POST["cardcsv"]);
      /*// check if phone number is well-formed
      if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/",$phoneNo)) {
        $phoneNoErr = "Invalid phone number format";
      }*/
    }

    if($cardNoErr=="" && $expDateErr=="" && $csvErr ==""){

      if(isset($_SESSION['uid'])){
        $uid = $_SESSION['uid'];
      }

      $sql = "UPDATE Creditcard SET Card_No='$cardNo', Expiry_Date='$expDate', CSV='$csv' WHERE User_ID='$uid'";

      if(mysqli_query($conn,$sql)){
        header('Location: mainpage.php');
        exit();
      }
    }
  }


?>
