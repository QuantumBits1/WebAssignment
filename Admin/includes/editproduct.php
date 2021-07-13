<?php
  /**********EDIT PRODUCT**********/

  require_once '../Database/connectdatabase.php';

  if(isset($_GET['action'])){
    if($_GET['action'] == "search"){
        $pid = $_GET['pid'];
        $sql = "SELECT * FROM product WHERE Product_ID='".$pid."'";  //Search the selected product from database
        $result = mysqli_query($conn,$sql);

        $entry = mysqli_fetch_assoc($result);
    }
  }

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
      $sql = "UPDATE product SET Category_ID='$catID', Product_Name='$productNm', Product_Price='$unitPrice', Product_Photo='$photoURL' WHERE Product_ID='$pid'";

      if(mysqli_query($conn,$sql)){
        header('Location: admin_viewproductui.php');
        exit();
      }
    }
  }


?>
