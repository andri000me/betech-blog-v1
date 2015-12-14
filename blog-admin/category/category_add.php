<?php
if(isset($_POST['btn-submit']))
{
	$cat_name = htmlentities($_POST['cat_name']);

	if(empty($cat_name)) {
		$_SESSION['msg_cat'] = '<div class="alert alert-danger">Kategori masih kosong !</div>';
		header('location:?mod=category&act=view');
	} else {
		$sql   = "INSERT INTO tb_category VALUES ('','$cat_name')";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));

		if($query) {
			$_SESSION['msg_cat'] = '<div class="alert alert-success">Berhasil menambah kategori !</div>';
			header('location:?mod=category&act=view');
		}
	}
}
?>