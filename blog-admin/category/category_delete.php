<?php 
require '../connection.php';
$id = $_GET['id'];

$sql   = "DELETE FROM tb_category WHERE cat_id = $id";
$query = mysqli_query($con,$sql) or die(mysqli_error($con));

$_SESSION['msg_cat'] = '<div class="alert alert-success">Berhasil menghapus kategori !</div>';
header('location:?mod=category&act=view');
?>