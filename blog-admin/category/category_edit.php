<?php
if(isset($_POST['btn-submit']))
{
	$cat_name = htmlentities($_POST['cat_name']);
	$cat_id   = $_POST['cat_id'];

	if(empty($cat_name)) {
		$_SESSION['msg_cat'] = '<div class="alert alert-danger">Kategori tidak boleh kosong !</div>';
		header('location:?mod=category&act=view');
	} else {
		$sql   = "UPDATE tb_category SET cat_name = '$cat_name' WHERE cat_id = $cat_id";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));

		if($query) {
			$_SESSION['msg_cat'] = '<div class="alert alert-success">Berhasil mengubah kategori !</div>';
			header('location:?mod=category&act=view');
		}
	}
}
?>