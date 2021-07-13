<?php
  $server = "localhost";
  $username = "root";
  $password = "root";
  $database = "webassigndb";

  $conn = mysqli_connect($server, $username, $password, $database, "3307");

  if ( mysqli_connect_errno() ) {
  // If there is an error with the connection, stop the script and display the error.
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
  }

?>