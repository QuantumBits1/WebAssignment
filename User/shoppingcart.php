<?php session_start(); ?>

<?php require_once '../Database/connectdatabase.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'templates/head.php' ?>

<?php
	if(!empty($_GET['action'])){
		switch($_GET['action']){
			case 'add':
				if(!empty($_POST["quantity"])){
					$pid = $_GET['pid'];
					$sql = 'SELECT * FROM product WHERE Product_ID ="'.$pid.'"';
					$resultSet = mysqli_query($conn,$sql);

					while($row=mysqli_fetch_assoc($resultSet)) {
						$result[] = $row;
					}

					$productArray = array($result[0]['Product_ID']=>array(
						'Product_Name'=>$result[0]['Product_Name'],
						'Product_ID'=>$result[0]['Product_ID'],
						'Product_Price'=>$result[0]['Product_Price'],
						'Product_Photo'=>$result[0]['Product_Photo'],
						'Quantity'=>$_POST["quantity"]));


					if(!empty($_SESSION['cartEntry'])){
						if(in_array($result[0]['Product_ID'],array_keys($_SESSION['cartEntry']))){
							foreach ($_SESSION['cartEntry'] as $key => $value) {
								if($result[0]['Product_ID'] == $key) {
									if(empty($_SESSION["cartEntry"][$key]["Quantity"])) {
										$_SESSION["cartEntry"][$key]["Quantity"] = 0;
									}
									$_SESSION["cartEntry"][$key]["Quantity"] += $_POST["quantity"];
								}
							}
						}else {
							$_SESSION["cartEntry"] = array_merge($_SESSION["cartEntry"],$productArray); }
					}else{
						$_SESSION['cartEntry'] = $productArray;
					}
				}
					break;
			case 'remove':
				if(!empty($_SESSION["cartEntry"])) {
					foreach($_SESSION["cartEntry"] as $key => $value) {
							if($_GET["pid"] == $key)
								unset($_SESSION["cartEntry"][$key]);
							if(empty($_SESSION["cartEntry"]))
								unset($_SESSION["cartEntry"]);
					}
				}
			break;

			case 'clear':
				unset($_SESSION['cartEntry']);
			break;

		}
	}
?>

<body>
	<?php include 'templates/header.php' ?>

	<div id="shopping-cart">
		<h1 class="txt-heading">Shopping Cart</h1>

		<a id="btnEmpty" href="shoppingcart.php?action=clear">Empty Cart</a>
		<?php
		if(isset($_SESSION['cartEntry'])){
			$totalQuantity = 0;
			$totalPrice = 0; ?>
			<table class="tbl-cart" cellpadding="10" cellspacing="1">
				<thead>
				<tr>
					<th style="text-align:left;">Name</th>
					<th style="text-align:left;">Code</th>
					<th style="text-align:right;" width="5%">Quantity</th>
					<th style="text-align:right;" width="10%">Unit Price</th>
					<th style="text-align:right;" width="10%">Price</th>
					<th style="text-align:center;" width="5%">Remove</th>
				</tr>
				</thead>
				<tbody>
				<?php
					foreach ($_SESSION['cartEntry'] as $item) {
						$price = $item['Quantity']*$item['Product_Price']; ?>

						<tr>
						<td><img src="../<?php echo $item['Product_Photo']; ?>" class="cart-item-image" /><?php echo $item['Product_Name']; ?></td>
						<td  style="text-align:right;"><?php echo $item['Product_ID']; ?></td>
						<td style="text-align:right;"><?php echo $item['Quantity']; ?></td>
						<td  style="text-align:right;"><?php echo "RM ". $item['Product_Price']; ?></td>
						<td  style="text-align:right;"><?php echo "RM ". number_format($price,2); ?></td>
						<td style="text-align:center;"><a href="shoppingcart.php?action=remove&pid=<?php echo $item['Product_ID']; ?>" class="btnRemoveAction"><img src="img/delete-icon.png" alt="Remove Item" /></a></td>
						</tr>
						<?php
							$totalQuantity += $item['Quantity'];
							$totalPrice += $price;
					} ?>

					<tr>
						<td colspan="2" align="right">Total</td>
						<td align="right"><?php echo $totalQuantity; ?></td>
						<td align="right" colspan="2"><strong><?php echo $totalPrice; ?></strong></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<div>
				<?php
					$vars = $_SESSION['cartEntry'];
					$qs = http_build_query($vars);
					$url = 'test.php?cart='.$qs;
				?>
				<a id="checkout-button" href="<?php echo $url;?>">Checkout</a></div>
		<?php } else { ?>
		  			<div class="no-records">Your Cart is Empty</div>
				<?php } ?>
	</div>

	<div id="product-grid">
		<div class="txt-heading">Related Products</div>
		<?php
			$sql = 'SELECT * FROM Product ORDER BY Product_ID ASC';
			$result = mysqli_query($conn,$sql);

			$counter = 0;
			if(mysqli_num_rows($result)>0 && $counter<12){
				foreach ($result as $entry) { ?>
					<div class="product-item">
						<form method="post" action="shoppingcart.php?action=add&pid=<?php echo $entry['Product_ID']; ?>">
							<div class="product-image"><a href="productdetailpage.php?pid=<?php echo $entry['Product_ID']; ?>">
            				<img src="../<?php echo $entry['Product_Photo']; ?>"></a></div>
							<div class="product-tile-footer">
								<div class="product-title"><?php echo $entry['Product_Name']; ?></div>
								<div class="product-price"><?php echo $entry['Product_Price']; ?></div>
								<div class="cart-action">
									<input type="number" class="product-quantity" name="quantity" value="1" min="1" size="2" />
									<input type="submit" value="Add to Cart" class="btnAddAction" />
								</div>
							</div>
						</form>
					</div>
				<?php $counter++;}
				mysqli_free_result($result);
			} ?>
	</div>
</body>
</html>
