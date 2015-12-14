<?php 
require '../connection.php';
$id = $_GET['id'];

$sql   = "DELETE FROM tb_user WHERE user_id = $id";
$query = mysqli_query($con,$sql) or die(mysqli_error($con));

$_SESSION['msg_user'] = '<div class="alert alert-success">Berhasil menghapus user !</div>';
header('location:?mod=user&act=view');
?>