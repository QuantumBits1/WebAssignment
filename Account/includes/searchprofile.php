<?php
	/**********SEARCH USER ACCOUNT INFO**********/
  require_once '../Database/connectdatabase.php';

  if(isset($_SESSION['uid'])){
      $uid = $_SESSION['uid'];

      $sql = "SELECT a.*, b.*, c.* FROM User as a, Bankaccount as b, creditcard as c WHERE a.User_ID=b.User_ID AND a.User_ID=c.User_ID AND a.User_ID=$uid";  //Search current user from database
      $result = mysqli_query($conn,$sql);
  }

?>