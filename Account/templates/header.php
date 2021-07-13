<?php
	if(isset($_SESSION['type'])){
		if($_SESSION['type'] == 'User'){
			include '../User/templates/header.php';
		} else {
			include '../Admin/templates/header.php';
		}
	}
?>
