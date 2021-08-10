<?php
	/**********SEARCH USER ACCOUNT INFO**********/
  require_once '../Database/database.php';

  $uid = '1';
  $_SESSION['uid'] = $uid;

  if(isset($_SESSION['uid'])) {
      $uid = $_SESSION['uid'];

      $db = new Database();
      $db->connectDatabase();
      //Search current user from database
      $sql = "SELECT * FROM User WHERE User_ID=$uid";
      $entry = $db->execute($sql);
  }

?>