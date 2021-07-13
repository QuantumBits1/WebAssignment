<?php
  /**********VIEW USER'S ACCOUNT**********/

	require_once '../Database/connectdatabase.php';

	if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
    $no_of_records_per_page = 5;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM user";
    
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

	if(!empty($_GET['action'])){
		if($_GET['action'] == 'search'){
			$sql = "SELECT * FROM user WHERE User_Type='".$_POST['usertype']."' AND Username= '".$_POST['searchinput']."' LIMIT ".$offset.",".$no_of_records_per_page;

			$result = mysqli_query($conn,$sql);
		}


	} else {
		$sql = "SELECT * FROM user LIMIT ".$offset.",".$no_of_records_per_page;
		$result = mysqli_query($conn,$sql);
	}


	
?>