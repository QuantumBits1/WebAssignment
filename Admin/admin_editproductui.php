<?php session_start(); ?>

<?php include 'includes/editproduct.php'; ?>

<!DOCTYPE html>
<html>
  <?php include 'templates/head.php'; ?>

<body>

  <?php include 'templates/header.php'; ?>

	<div class="container">
    <div class="row">
      <form id="editproduct-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=search&pid=<?php echo $entry['Product_ID'];?>" method="post">
        <h2 class="heading" id="editproduct">Edit Product</h2>
        <p>
          <label>Product ID</label>
          <input type="text" name="" readonly="true" value="<?php echo $pid; ?>">
        </p>
        <p>
          <label>Product Category</label>
          <select name="producttype">
            <option value="none">Choose Product Category</option>
            <option value="C01">Vegetables</option>
            <option value="C02">Fruits</option>
          </select>
          <span class="error"><?php echo $catIDErr; ?></span>
        </p>
        <p>
          <label>Product Name</label>
          <input type="text" name="productname" value="<?php echo $productNm; ?>" placeholder="Enter product name">
          <span class="error"><?php echo $productNmErr; ?></span>
        </p>
        <p>
          <label>Unit Price</label>
          <input type="number" step="any" min="0" name="unitprice" value="<?php echo $unitPrice; ?>" placeholder="RM 00.00">
          <span class="error"><?php echo $unitPriceErr; ?></span>
        </p>
        <p>
          <label>Photo URL</label>
          <input type="text" name="photourl" value="<?php echo $photoURL; ?>" placeholder="Enter URL">
          <span class="error"><?php echo $photoURLErr; ?></span>
        </p>
      
      </form>
    </div>
    <div class="buttons-group">
      <input type="submit" class="cancel-button" name="cancel" value="cancel" onclick="goPrev()">

      <button form="editproduct-form" class="apply-button" type="submit" name="apply-button" value="">Apply</button>
    </div>
  </div>
  
  <!-- Javascript code to show/hide sidebar -->
  <?php include 'templates/footer.php'; ?>

  <!-- Javascript code for Cancel button -->
  <script>
    function goPrev()
    {
      document.write(document.referrer);
      window.history.back();
    }
  </script>

</body>
</html>