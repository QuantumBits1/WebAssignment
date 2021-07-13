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
    <title>Product-Organic Online Store</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/productpage.css">
</head>

<body>
  <?php include 'templates/header.php'; ?>

  <section class="product-grid">
    <h1 class="heading">All Products</h1>
    <?php
      if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
      $no_of_records_per_page = 6;
      $offset = ($pageno-1) * $no_of_records_per_page;

      $total_pages_sql = "SELECT COUNT(*) FROM product";

      $result = mysqli_query($conn,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);

      $sql = "SELECT * FROM product LIMIT ".$offset.",".$no_of_records_per_page;
      $resultData = mysqli_query($conn,$sql);

      if(mysqli_num_rows($resultData)>0){
        foreach ($resultData as $entry) { ?>
          <div class="item-product">
            <form method="post"
            action="<?php
              if(isset($_SESSION['logged'])){
                if($_SESSION['logged'] == TRUE) {
                  echo 'shoppingcart.php?action=add&pid='.$entry['Product_ID'];
                }
              } else {
                  echo '../Authentication/loginpage.php';
                }
            ?>">
              <div class="item-product-image"><a href="productdetailpage.php?pid=<?php echo $entry['Product_ID']; ?>"><img src="../<?php echo $entry['Product_Photo']; ?>"></a></div>
              <div class="item-product-footer">
                <div class="item-product-title"><?php echo $entry['Product_Name']; ?></div>
                <div class="item-product-price">RM <?php echo $entry['Product_Price']; ?>/KG</div>
                <div class="cart-action">
                  <input type="number" name="quantity" value="1" min="1" class="item-product-quantity">
                  <input type="submit" value="Add to Cart" class="addcart-button">
                </div>
              </div>
            </form>
          </div>
        <?php }
        mysqli_free_result($result);
      } ?>
  </section>

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

  <footer class="footer-distributed">
    <?php include 'templates/footer.php'; ?>
  </footer>
</body>
</html>
