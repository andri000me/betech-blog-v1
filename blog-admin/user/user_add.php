<?php
if(isset($_POST['btn-submit']))
{
	$user_name     = htmlentities($_POST['user_name']);
	$user_pass     = htmlentities($_POST['user_pass']);
	$user_fullname = htmlentities($_POST['user_fullname']);

	if(empty($user_name) || empty($user_pass) || empty($user_fullname)) {
		$_SESSION['msg_usr'] = '<div class="alert alert-danger">Error - Masih ada yang kosong !</div>';
		header('location:?mod=user&act=view');
	} else {
		$sql   = "INSERT INTO tb_user VALUES('','$user_name',md5('$user_pass'),'$user_fullname')";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));

		if($query) {
			$_SESSION['msg_usr'] = '<div class="alert alert-success">Berhasil menambah user !</div>';
			header('location:?mod=user&act=view');
		}
	}
}
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Tambah User</h2>

	<?php echo (isset($alert)) ? $alert : ''; ?>

	<form class="form-horizontal" action="" method="post" name="" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" name="user_fullname" class="form-control" placeholder="Nama Lengkap">
		</div>
		<div class="form-group">
			<input type="text" name="user_name" class="form-control" placeholder="Username">
		</div>
		<div class="form-group">
			<input type="password" name="user_pass" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary" name="btn-submit">Tambah</button>
			<button type="button" class="btn btn-default" onclick="return confirm('Yakin batal?') ? window.history.go(-1) : '';">Batal</button>
		</div>
	</form>
</div>
