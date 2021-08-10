<?php
	require_once '../Database/connectdatabase.php';

	$loginErr = $fNameErr = $lNameErr = $usernmErr = $emailErr = $phoneNoErr = $pwdErr = $conPwdErr = $bothPwdErr = "";
	$fName = $lName = $usernm = $email = $phoneNo = $pwd = $conPwd = "";

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(!empty($_GET['action'])) {
		switch ($_GET['action']) {

			case 'login':
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if (empty($_POST["email"])) {
						$emailErr = "Email is required";
					} else {
						$email = test_input($_POST["email"]);
						// check if e-mail address is well-formed
						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							$emailErr = "Invalid email format";
						}
					}

					if (empty($_POST["password"])) {
				    	$pwdErr = "Password is required";
					} else {
						$pwd = test_input($_POST['password']);
					}

					if($emailErr =="" && $pwdErr=="") {
						$sql = "SELECT User_ID, User_Type from user WHERE Email='$email' AND Password='$pwd'";
						$result = mysqli_query($conn, $sql);
      					$entry = mysqli_fetch_assoc($result);
						
						if (mysqli_num_rows($result)>0) {
							$_SESSION['logged'] = TRUE;
							$_SESSION['uid'] = $entry['User_ID'];
							$_SESSION['type'] = $entry['User_Type'];

							if($entry['User_Type'] == "User") {
								header('Location: ../User/index.php');
			        			exit();
							} else {
								header('Location: ../Admin/admin_viewuseraccui.php');
								exit();
							}
						} else {
							$loginErr = "Email and/or password didn't match!";
						}
					}
				}
				break;

			case 'signup':

				/**********ERROR CHECKING**********/
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				  if (empty($_POST["firstname"])) {
				    $fNameErr = "First name is required";
				  } else {
				    $fName = test_input($_POST["firstname"]);
				    // check if name only contains letters and whitespace
				    if (!preg_match("/^[a-zA-Z-' ]*$/",$fName)) {
				      $fNameErr = "Only letters and white space allowed";
				    }
				  }

				  if (empty($_POST["lastname"])) {
				    $lNameErr = "Last name is required";
				  } else {
				    $lName = test_input($_POST["lastname"]);
				    // check if name only contains letters and whitespace
				    if (!preg_match("/^[a-zA-Z-' ]*$/",$lName)) {
				      $lNameErr = "Only letters and white space allowed";
				    }
				  }

				  if (empty($_POST["username"])) {
				    $usernmErr = "Username is required";
				  } else {
				    $usernm = test_input($_POST["username"]);
				    // check if name only contains letters and whitespace
				    if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $usernm)) {
				      $usernmErr = "Only letters and white space allowed";
				    }
				  }

				  if (empty($_POST["email"])) {
				    $emailErr = "Email is required";
				  } else {
				    $email = test_input($_POST["email"]);
				    // check if e-mail address is well-formed
				    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				      $emailErr = "Invalid email format";
				    }
				  }

				  if (empty($_POST["phonenumber"])) {
				    $phoneNoErr = "Phone number is required";
				  } else {
				    $phoneNo = test_input($_POST["phonenumber"]);
				  }

				  if (empty($_POST["password"])) {
				    	$pwdErr = "Password is required";
				  }

				  if(empty($_POST["confirmpassword"])) {
				    	$conPwdErr = "Confirm password is required";
				  } else {
				  		$pwd = test_input($_POST["password"]);
				      $conPwd = test_input($_POST["confirmpassword"]);

				      	// check if password and confirm password is matched
				      	if ($pwd != $conPwd) {
									$bothPwdErr = "Confirm password didn't match!";
				      	}
				  }

					if($fNameErr=="" && $lNameErr=="" && $usernmErr=="" && $emailErr ==""
						&& $phoneNoErr=="" && $pwdErr=="" && $conPwdErr=="" && $bothPwdErr==""){
					
					$sql = "INSERT INTO user (First_Name,Last_Name,Username,Email,Password,Phone_Number) 
					VALUES ('$fName','$lName','$usernm','$email','$conPwd','$phoneNo')";

					if(mysqli_query($conn,$sql)) {
						header('Location: loginpage.php');
						exit();
					} else {
						echo ''.mysqli_error($conn);
					}
				}
				}
				break;
		}
	}
	// Close statement
	//mysqli_stmt_close($stmt);
	mysqli_close($conn);

	unset($_GET['action']);
?>
