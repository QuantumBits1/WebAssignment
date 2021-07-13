<?php session_start(); ?>
<!-- first commit -->
<!DOCTYPE html>
<html lang="en">
  <?php include 'templates/head.php'; ?>

<body>
  <?php include 'templates/header.php'; ?>

  <section class="container">
    <div class="row">
      <div class="column-50">
        <h2>Organic and Healthy</h2>
        <p>Our products are 100% organic, picked from local farms and packed with full of essential nutritions.</p>
        <button class="shopnow-button"><a href="../Authentication/loginpage.php">Shop Now</a></button>
      </div>
      <div class="column-50">
        <img src="img/organic-food5.png">
      </div>
    </div>

  </section>


  <?php include 'templates/footer.php'; ?>

  <script>
  /* When the user clicks on the button,
  toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  // Close the dropdown if the user clicks outside of it
  window.onclick = function(e) {
    if (!e.target.matches('.dropdown-button')) {
    var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
    }
  }
</script>
</body>
</html>
