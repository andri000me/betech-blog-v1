<?php 

require '../connection.php';

cek_login();

if(isset($_POST['btn-submit']))
{
	$username = mysqli_real_escape_string($con,$_POST['user_name']);
	$password = mysqli_real_escape_string($con,$_POST['user_pass']);

	if(empty($username) || empty($password))
	{
		$error = '<p class="bg-danger error">Username atau Password masih kosong !</p>';
	}
	else
	{
		$sql   = "SELECT * FROM tb_user WHERE user_name='$username' && user_pass=md5('$password')";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));

		if(mysqli_num_rows($query) != 0)
		{
			$data = mysqli_fetch_array($query);

			$_SESSION['user_name']     = $username;
			$_SESSION['user_fullname'] = $data['user_fullname'];
			$_SESSION['user_id']       = $data['user_id'];
			$_SESSION['user_login']    = 'true';

			header('location:dashboard.php');
		}
		else
		{
			$error = '<p class="bg-danger error">Username atau Password salah !</p>';
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<!-- File CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css">
	
	<!-- Script CSS -->
	<style>
		body {
			margin-top: 50px;
			background-color: #eee
		}
		h2 {
			text-align: center;
		}
		.form-login {
			max-width: 330px;
			margin: 0 auto;
		}
		.error {
			font-weight: bold;
			padding: 10px;
			border-radius: 3px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
		}
	</style>	

	<title>Login</title>
</head>
<body>
	<div class="container">
		<form action="" method="post" name="" class="form-login">
			<h2>Silahkan Login</h2>
			<?php echo (isset($error)) ? $error : ''; ?>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Username" name="user_name">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Password" name="user_pass">
			</div>
			<button class="btn btn-lg btn-block btn-primary" type="submit" name="btn-submit">Login</button>
		</form>
	</div>
	
<!-- File Javascript -->
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
