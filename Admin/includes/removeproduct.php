<?php
	/**********REMOVE USER ACCOUNT**********/

	require_once '../../Database/connectdatabase.php';

	if(isset($_GET['action'])){
		if($_GET['action'] == "remove"){
		    $pid = $_GET['pid'];
		    $sql = "DELETE FROM product WHERE Product_ID='".$pid."'";  //Search the selected product from database
		    if(mysqli_query($conn,$sql)){
		    	mysqli_close($conn);
		    	header('Location: ../admin_viewproductui.php');
		    	exit();
		    }
		}
	}
?>