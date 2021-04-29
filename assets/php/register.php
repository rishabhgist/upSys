<?php 
	// if (isset($_POST['username'])) {
	// 	session_start();
	// 	$db = mysql_connect('localhost','root','','upservice');
	// 	if ($db) {
			
	// 	}
	// 	$username = $_POST['username'];
	// 	$password = $_POST['username'];
	// 	$verified = false;
	// 	$type = "user";
	// 	$vcode = rand(1000,9999);
	// 	$query = "INSERT INTO users (id, username, password, verified, type, vcode) VALUES ('$username','$password','$verified','$type','$vcode')";
	// 	$result = mysqli_query($db,$query);
	// 	if ($result) {
	// 					$_SESSION['id'] = "verify";
	// 					$_SESSION['message'] = "Please verify your email";
	// 					$_SESSION['username'] = $username;
	// 					$_SESSION['password'] = $password;
	// 	}else{
	// 		echo "Error".mysqli_error();
	// 	}
	// }

	if (isset($_POST['submit'])) {
		$db = mysqli_connect('localhost','root','','upservice');
		$username = $_POST['username'];
		$password = $_POST['username'];
		$verified = false;
		$type = "user";
		$vcode = rand(1000,9999);
		$query = "INSERT INTO users (id, username, password, verified, type, vcode) VALUES ('$username','$password','$verified','$type','$vcode')";
		$result = mysqli_query($db,$query);
		if ($result) {
			echo "All Done";
		}else{
			echo mysqli_error($result);
		}
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Reg</title>
 </head>
 <body>
 	<form method="POST">
 		<input type="text" name="username">
 		<input type="password" name="password">
 		<button type="submit" name="submit">Save</button>
 	</form>
 </body>
 </html>