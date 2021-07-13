<header>
	<h1 id="logo">Organic Groceries Online Store</h1>
	<nav>
		<ul>
			<li><a href="../User/index.php">Home</a></li>
			<li><a href="../User/aboutuspage.php">About Us</a></li>
			<li><a href="../User/productpage.php">Product</a></li>
			<?php if(isset($_SESSION['logged'])) {
				if($_SESSION['logged'] == TRUE) { ?>
					<li id=""><a id="" href="../User/shoppingcart.php"><img src="../User/img/shoppingcart-icon-24px.png" alt="shopping cart"></a></li>
					<li class="dropdown-menu">
						<button class="dropdown-button" onclick="myFunction()"><img src="../User/img/profile-icon-24px.png"></button>
						<ul class="dropdown-content" id="myDropdown">
							<li><a id="" href="../Account/mainpage.php">Edit Profile</a></li>
							<li><a id="" href="../Authentication/logoutpage.php">Sign Out</a></li>
						</ul>
					</li>
				<?php }
       		}  else { ?>
					<li id="login-button"><a id="login-link" href="../Authentication/loginpage.php">Login</a></li>
       				<li id="signup-button"><a id="signup-link" href="../Authentication/signuppage.php">Sign Up</a></li>
			<?php } ?>
		</ul>
	</nav>
</header>
