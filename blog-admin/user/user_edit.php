<?php
if(isset($_POST['btn-submit']))
{
	$user_id       = $_POST['user_id'];
	$user_name     = htmlentities($_POST['user_name']);
	$user_pass     = htmlentities($_POST['user_pass']);
	$user_fullname = htmlentities($_POST['user_fullname']);

	if(empty($user_name) || empty($user_fullname))
	{
		$alert = '<div class="alert alert-danger">Error - Masih ada yang kosong !</div>';
	}
	elseif(empty($user_pass)) // jika tidak ada perubahan password
	{
		$sql = "UPDATE tb_user SET user_name='$user_name',user_fullname='$user_fullname' WHERE user_id = $user_id";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));
	}
	else // jika ada perubahan password
	{
		$sql = "UPDATE tb_user SET user_name='$user_name',user_fullname='$user_fullname',user_pass=md5('$user_pass') WHERE user_id = $user_id";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));	
	}

	if($query) {
		$_SESSION['msg_usr'] = '<div class="alert alert-success">Berhasil mengubah user !</div>';
		header('location:?mod=user&act=view');
	}
}
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Tambah User</h2>

	<?php echo (isset($alert)) ? $alert : ''; ?>

	<?php
		$id  = $_GET['id'];
		$sql = "SELECT * FROM tb_user WHERE user_id = $id";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));
		$data = mysqli_fetch_array($query);
	?>

	<form class="form-horizontal" action="" method="post" name="" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" name="user_fullname" class="form-control" placeholder="Nama Lengkap" value="<?php echo $data['user_fullname']; ?>">
		</div>
		<div class="form-group">
			<input type="text" name="user_name" class="form-control" placeholder="Username" value="<?php echo $data['user_name']; ?>">
		</div>
		<div class="form-group">
			<input type="password" name="user_pass" class="form-control" placeholder="Password">
			<p class="help-block">Kosongkan Kolom Password jika tidak ingin mengubah password</p>
		</div>
		<div class="form-group">
			<input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">
			<button type="submit" class="btn btn-primary" name="btn-submit">Ubah</button>
			<button type="button" class="btn btn-default" onclick="return confirm('Yakin batal?') ? window.history.go(-1) : '';">Batal</button>
		</div>
	</form>
</div>