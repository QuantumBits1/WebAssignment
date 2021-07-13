<?php
	require_once '../Database/connectdatabase.php';

	$sql = "SELECT * from product ORDER BY Product_ID DESC LIMIT 1";
      $result = mysqli_query($conn,$sql);
      $lastRow = mysqli_fetch_assoc($result);

      $lastRowPID = $lastRow['Product_ID'];

      echo $lastRowPID;

      $numbers = preg_match("/P(\d+)/", $lastRowPID, $matches)
              ? (int)$matches[1]
              : NULL;
		unset($matches);

	echo $numbers;
  	
?>