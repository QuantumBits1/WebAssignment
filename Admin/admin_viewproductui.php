<?php session_start(); ?>

<?php include 'includes/searchproduct.php'; ?>

<!DOCTYPE html>
<html>
  <?php include 'templates/head.php'; ?>

<body>
  <?php include 'templates/header.php'; ?>

  <div class="container">
    <div class="row">
      <div class="column-25">
        <?php include 'templates/sidebar.php'; ?>
      </div>
      <div class="column-75">
    		<form class="viewproduct-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=search">
          <h2 class="heading">List of Product</h2>
      		<label>Product Category</label>
      		<select name="producttype">
      		  <option value="none">Choose Product Category</option>
      		  <option value="C01">Vegetables</option>
      		  <option value="C02">Fruits</option>
      		</select><br>
      		<label>Search Product</label>
        		<input type="text" name="searchinput" placeholder="Search by product name"><button class="search-button" type="submit"><img class="icon" src="img/search-icon-24px.png"></button>
    		</form>

    		<table class="gridtable">
          <thead class="">
            <tr>
              <th id="text-center">Product ID</th>
              <th id="text-center">Product Photo</th>
              <th id="text-center">Category</th>
              <th id="text-center">Name</th>
              <th id="text-center">Price\KG</th>
              <th id="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(mysqli_num_rows($result) > 0){
              foreach ($result as $entry) { ?>
                  <tr>
                    <td class=""><?php echo $entry['Product_ID']; ?></td>
                    <td class=""><img src="../<?php echo $entry['Product_Photo']; ?>"></td>
                    <td class=""><?php echo $entry['Category_Name']; ?></td>
                    <td class=""><?php echo $entry['Product_Name']; ?></td>
                    <td class=""><?php echo $entry['Product_Price']; ?></td>
                    <td class=""><a href="admin_editproductui.php?action=search&pid=<?php echo $entry['Product_ID']; ?>"><img class="icon" src="img/edit-icon-24px.png"></a><a href="includes/removeproduct.php?action=remove&pid=<?php echo $entry['Product_ID']; ?>"><img src="img/deletebin-icon-24px.png"></a></td>

                  </tr>
              <?php }
            } else { ?>
                <tr>
                  <td class="">No Data Found</td>
                </tr>
            <?php }
            mysqli_free_result($result); ?>

          </tbody>
        </table>

    	  <div class="product-page">
            <ul class="pagination">
              <li><a href="?pageno=1">First</a></li>
              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                  <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
              </li>
              <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                  <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
              </li>
              <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
    	  </div>

      </div>
    </div>

  </div>

  <!-- Javascript code to show/hide sidebar -->
  <?php include 'templates/footer.php'; ?>


  <!-- Javascript code to show/hide sidebar -->
	<script>
	  $('.product-button').click(function(){
	    $('aside ul .product-show').toggleClass("show");
	  });
	  $('.useracc-button').click(function(){
	    $('aside ul .useracc-show').toggleClass("show1");
	  });
	</script>

</body>
</html>
