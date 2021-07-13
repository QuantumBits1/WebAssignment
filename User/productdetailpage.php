<?php session_start(); ?>

<?php require_once '../Database/connectdatabase.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
  </style>
    <title>Product Details-Organic Online Store</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/productdetailpage.css" />
</head>

<body>
  <?php include'templates/header.php'; ?>

  <section class="product-grid">
    <h1 class="heading">Product</h1>

    <?php
      if(!empty($_GET['pid'])){
        $pid = $_GET['pid'];

        $sql = 'SELECT * FROM Product WHERE Product_ID = "'.$pid.'"';

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) == 1){
          $row = mysqli_fetch_assoc($result); ?>

          <div class="item-product">
        		<div class="item-product-image"><img src="../<?php echo $row['Product_Photo']; ?>"></div>
              <form class="item-product-right" method="post"
              action="<?php
                if (isset($_SESSION['logged'])){
                  if($_SESSION['logged'] == TRUE) {
                    echo 'shoppingcart.php?action=add&pid='.$row['Product_ID'];
                  }
                } else {
                    echo '../Authentication/authpage.php?auth=login';
                  }
              ?>">
                  <div class="item-product-title"><?php echo $row['Product_Name']; ?></div>
									<div class="item-product-cat"><?php
										if($row['Category_ID'] == "C01"){
											echo "Vegetables";
										} else {
											echo "Fruits";
										}
										?></div>
										<div class="item-product-price">RM <?php echo $row['Product_Price']; ?>/KG</div>
                  <div class="item-product-desc"><?php echo $row['Product_Desc']; ?></div>
                  <div class="cart-action">
                    <input type="number" name="quantity" value="1" min="1" class="item-product-quantity">
                    <input type="submit" value="Add to Cart" class="addcart-button">
                  </div>
              </form>
          </div>
        <?php }
        mysqli_free_result($result);
      } ?>
  </section>

  <footer class="footer-distributed">
    <?php include 'templates/footer.php'; ?>
  </footer>
</body>
</html>
