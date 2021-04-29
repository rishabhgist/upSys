<?php 
	if ($_SESSION['id'] == "verify") {
			$_SESSION['message'] = "Please verify your email";
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$message ='';
			$db = mysql_connect('localhost','root','','upservice');
			if(isset($_POST['verify'])){
				$vcode = $_POST['vcode'];
				$q = "SELECT vcode FROM users WHERE username='$username'";
				$result = mysqli_query($db,$q);
				$verifyCode = mysqli_fetch_assoc($result);
				if ($vcode == $verifyCode) {
					$verified = true;
					$query = "INSERT INTO users (verified) VALUES ('$verified')";
					$result_verify = mysqli_query($db,$query);
					if ($result_verify) {
						$message = "Code verified succesfully";
						session_destroy();
						header('location:../../');
					}
				}else{
					$message = "Not Verified".mysqli_error();
				}

			}
?>
<html>
<head>
	<title>Verfiy your Email</title>
	<style type="text/css">
		.container{
			padding: 30px 100px;
		}
		h1{
			font-size: 30px;
		}
		label{
			display: block;
			margin-bottom: 20px;
		}
		button{
			background-color:#717CFF;
			border-color: #717CFF;
			color: #fff;
			display: block;
			margin:30px 0;
			width: 100px;
			height: 30px;
			outline: none;
		}
		button:active{
			background-color:#717CFF;
			border-color: #717CFF;
			color: #fff;
		}


	</style>
</head>
<body>
	<div class="container">
		<img src="../img/gallery/logo.png">
		<h1>Email Verification Required</h1>
		<form>
			<label>Email : </label>
			<label>Verfication Code</label>
			<input type="text" name="vcode" id="vcode">
			<button type="button" name="verify">Verify</button>
			<p><?php echo $message; ?></p>
		</form>
	</div>
</body>
</html>
<?php 
}else{
		echo "<h2>This Page is forbidden ! Access Denied</h2>";
		echo "<h3>Your IP address has been captured for security reasons.</h3>";
		echo "<p>&copy; upServices</p>";
	} 
?>
