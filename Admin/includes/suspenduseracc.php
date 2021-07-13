<?php
	/**********SUSPEND USER ACCOUNT**********/

	require_once '../../Database/connectdatabase.php';

	if(isset($_GET['action'])){
		if($_GET['action'] == "suspend"){
			$uid = $_GET['uid'];
			$status = $_POST['status'];
			$sql = "UPDATE user SET Account_Status='$status' WHERE User_ID='$uid'"; //Update user's account status
		    if(mysqli_query($conn,$sql)){
		    	mysqli_close($conn);
					header('Location: ../Admin_viewuseraccui.php');
					exit();
		    }
		}
	}
?>
