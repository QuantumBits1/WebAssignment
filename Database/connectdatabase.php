<?php
  $server = "localhost";
  $username = "root";
  $password = "root";
  $database = "webassigndb";
  $port = "3307";

  $conn = mysqli_connect($server, $username, $password, $database, $port);

  if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
  }

  // mysqli_close($conn);

  // try {
  //   $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
  //   $conn->setAttribute(PDO::ATR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // } catch(PDOException $e) {
  //   echo $sql.$e->getMessage();
  // }

  // $conn = null;
?>