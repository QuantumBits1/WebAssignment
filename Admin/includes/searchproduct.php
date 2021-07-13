<?php
  /**********VIEW PRODUCT**********/

	require_once '../Database/connectdatabase.php';

	if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
    $no_of_records_per_page = 5;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM product";
    
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

	if(!empty($_GET['action'])){
		if($_GET['action'] == 'search'){
			$sql = "SELECT a.*, b.* FROM product AS a, productcategory AS b WHERE a.Category_ID='".$_POST['producttype']."' AND a.Product_Name= '".$_POST['searchinput']."' AND a.Category_ID = b.Category_ID LIMIT ".$offset.",".$no_of_records_per_page;

			$result = mysqli_query($conn,$sql);
		}


	} else {
		$sql = "SELECT a.*, b.* FROM product AS a,productcategory AS b WHERE a.Category_ID=b.Category_ID LIMIT ".$offset.",".$no_of_records_per_page;
		$result = mysqli_query($conn,$sql);
	}


	
?>