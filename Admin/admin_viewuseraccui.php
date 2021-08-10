<?php session_start(); ?>

<?php include 'includes/searchuseracc.php'; ?>

<!DOCTYPE html>
<html>
  <?php include 'templates/head.php'; ?>

<body>
  <?php include 'templates/header.php'; ?>

	<div class="container">
    <div class="row">
      <div class="column-25">
        
      </div>
      <div class="column-75">
        <form class="viewuseracc-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=search">
          <h2 class="heading">List of User's Account</h2>
          <label>User Type</label>
          <select name="usertype">
            <option value="none">Choose User Type</option>
            <option value="user">User</option>
            <option value="Admin">Admin</option>
          </select><br/>
          <label>Search Account</label>
            <input type="text" name="searchinput" placeholder="Search by username"/><button class="search-button" type="submit"><img class="icon" src="img/search-icon-24px.png"></button>
        </form>

        <table class="gridtable">
          <thead class="">
            <tr>
              <th id="text-center">No</th>
              <th id="text-center">User ID</th>
              <th id="text-center">Type</th>
              <th id="text-center">Username</th>
              <th id="text-center">Name</th>
              <th id="text-center">Email</th>
              <th id="text-center">Action</th>
              <th id="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(mysqli_num_rows($result) > 0){
              $count = 0;
              foreach ($result as $entry) { ?>
                  <tr style="<?php
                    if($entry['Account_Status'] == 'Suspend')
                      echo "color: #F53525";
                    ?>">
                    <td class=""><?php echo ++$count; ?></td>
                    <td class=""><?php echo $entry['User_ID']; ?></td>
                    <td class=""><?php echo $entry['User_Type']; ?></td>
                    <td class=""><?php echo $entry['Username']; ?></td>
                    <td class=""><?php echo $entry['First_Name'].' '.$entry['Last_Name']; ?></td>
                    <td class=""><?php echo $entry['Email']; ?></td>
                    <td class=""><?php echo $entry['Account_Status']; ?></td>
                    <td class=""><a href="admin_edituseraccui.php?action=search&uid=<?php echo $entry['User_ID']; ?>"><img class="icon" src="img/edit-icon-24px.png"></a><a href="includes/removeuseracc.php?action=remove&uid=<?php echo $entry['User_ID']; ?>"><img src="img/deletebin-icon-24px.png"></a></td>

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
