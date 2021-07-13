<?php
  /**********ADD PRODUCT**********/

  require_once '../Database/connectdatabase.php';

  /*ERROR CHECKING*/
  // define variables and set to empty values
  $catIDErr = $productNmErr = $unitPriceErr = $photoURLErr = "";
  $catID = $productNm = $unitPrice = $photoURL = "";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["producttype"] == "none") {
      $catIDErr = "Product category is required";
    } else {
      $catID = test_input($_POST["producttype"]);
    }

    if (empty($_POST["productname"])) {
      $productNmErr = "Product name is required";

    } else {
      $productNm = test_input($_POST["productname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$productNm)) {
        $productNmErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["unitprice"])) {
      $unitPriceErr = "Unit price is required";
    } else {
      $unitPrice = test_input($_POST["unitprice"]);
      // check if price is numeric
      if(!is_float(floatval($unitPrice))){
        $unitPriceErr = "Invalid price, only double-typed allowed";
      }
    }

    if (empty($_POST["photourl"])) {
      $photoURLErr = "Photo URL is required";
    } else {
      $photoURL = test_input($_POST["photourl"]);
    }

    if($catIDErr == "" && $productNmErr=="" && $unitPriceErr=="" && $photoURLErr==""){
      $sql = "SELECT * from product ORDER BY Product_ID DESC LIMIT 1";  //Get last row or record data
      $result = mysqli_query($conn,$sql);
      $lastRow = mysqli_fetch_assoc($result);

      $lastRowPID = $lastRow['Product_ID'];  //Find and assigned Product_ID column value

      $PID = preg_match("/P(\d+)/", $lastRowPID, $matches)  //extract the integer part of the string
              ? (int)$matches[1]
              : NULL;
      unset($matches);

      $PID += 1;  //increment the integer part by one
      $newPID = "P".$PID;  //concatenate the integer part with "P"

      $sql = "INSERT INTO product (Product_ID,Product_Name,Product_Price,Product_Photo,Category_ID) VALUES ('$newPID','$productNm','$unitPrice','$photoURL','$catID')";

      if(mysqli_query($conn,$sql)){
        header('Location: admin_viewproductui.php');
        exit();
      }
    }
  }


?>
