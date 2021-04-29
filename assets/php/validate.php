<?php 
	session_start();
	$db = mysql_connect('localhost','root','','upservice');
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['username'];
		$query = "SELECT * FROM users WHERE username = '$username' AND password ='$password'";
		$result = mysqli_query($db,$query);
		$type = mysqli_fetch_assoc($result);

		if (mysqli_num_rows($result) == 1 ) {
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['type'] = $type;
			echo "success";
		}else{
			echo "error".mysqli_error();
		}
	}
 ?>