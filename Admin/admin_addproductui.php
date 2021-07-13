<?php session_start(); ?>

<?php include 'includes/addproduct.php'; ?>

<!DOCTYPE html>
<html>
  <?php include 'templates/head.php'; ?>

<body>

  <?php include 'templates/header.php'; ?>

	<div class="container">
    <div class="row">
      <form id="addproduct-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=add" method="post">
        <h2 class="heading" id="addproduct">Add Product</h1>
        <p>
          <label for="country">Product Category</label>
          <select name="producttype">
            <option value="none">Choose Product Category</option>
            <option value="C01">Vegetables</option>
            <option value="C02">Fruits</option>
          </select><br>
          <span class="error"><?php echo $catIDErr; ?></span>
        </p>
        <p>
          <label for="productname">Product Name</label>
          <input type="text" id="productname" name="productname" value="<?php echo $productNm; ?>" placeholder="Enter product name">
          <span class="error"><?php echo $productNmErr; ?></span>
        </p>
        <p>
          <label for="lname">Unit Price</label>
          <input type="number" step="any" min="0" id="unitprice" name="unitprice" placeholder="RM 00.00">
          <span class="error"><?php echo $unitPriceErr; ?></span>
        </p>
        <p class="col-75">
          <label for="lname">Photo URL</label>
          <input type="text" id="photourl" name="photourl" value="<?php echo $photoURL; ?>" placeholder="Enter URL">
          <span class="error"><?php echo $photoURLErr; ?></span>
        </p>

      </form>
    </div>
    <div class="buttons-group">
      <input type="submit" class="cancel-button" name="cancel" value="cancel" onclick="goPrev()">

      <button form="addproduct-form" class="add-button" type="submit" name="add-button" value="">Apply</button>
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
