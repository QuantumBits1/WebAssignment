<?php
	/**********REMOVE USER ACCOUNT**********/

	require_once '../../Database/connectdatabase.php';
  
	if(isset($_GET['action'])){
		if($_GET['action'] == "remove"){
			$uid = $_GET['uid'];
			$sql = "DELETE FROM user WHERE User_ID= '$uid'";  //Search the selected user from database
			if(mysqli_query($conn,$sql)){
				mysqli_close($conn);
				header('Location: ../admin_viewuseraccui.php');
				exit();
			}
		}
	}
?>